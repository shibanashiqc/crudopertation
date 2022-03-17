<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tasks;
use App\Models\Activity;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'g-recaptcha-response' => 'required|recaptcha',
            'type' => ['required'],
        ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $count = 0;
        for($i=0; $i<50; $i++){
            //Checking api data

            $data = file_get_contents('http://www.boredapi.com/api/activity?type='.$input['type']);
            $data = json_decode($data);

            //checking activites
            if (Activity::where('key', '=',  $data->key)
            ->where('user_id', '=', $user->id)
            ->exists()) {
                continue;
            }

            if($count == 10){
               $i = 50;
               break;
            }

            //saving activities

            $activity = new \App\Models\Activity;
            $activity->user_id = $user->id;
            $activity->activity = $data->activity;
            $activity->type = $data->type;
            $activity->key = $data->key;
            $activity->save();
            $count++;

        }


        $email_data = array(
            'name' => $user['name'],
            'email' => $user['email'],
        );


        Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to TestMode')
                ->from('test@igsocialtool.com', 'TestMode');
        });

        return $user;



    }
}
