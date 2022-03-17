<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Livewire\WithPagination;
class AdminDashboard extends Component
{

    use WithPagination;

    public $editable = false;
    public $activity_id;
    public $datas = [];
    public $activity_name;
    public $alerts = [];
    public $msg;
    public $limit;
    public $fetchlimit;

    public function edit($id)
    {

        $find = Activity::find($id);
        $this->datas = $find;
       // dd($this->datas);
        $this->activity_name = $find->activity;
        $this->activity_id = $id;
        //dd($id);
        $this->editable = true;
    }

    public function update_d($id){
       // dd($id);

        $activity = $this->activity_name;
        $id = $id;
        $update = Activity::where('id',$id)->update(['activity'=>$activity]);

        return $this->alert(
            'success',
            'Updated Successfully',
        );



        // $this->msg = 'Activity Updated Successfully';

    }

    public function cancel (){
        $this->editable = false;
        //dd('cancel');
    }


    public function delete($id){
        $delete = Activity::where('id',$id)->delete();
        return $this->alert(
            'success',
            'Deleted Successfully',
        );
    }

    public function more($id){

        $this->fetchlimit++;
        if($this->fetchlimit > 2){
           return $this->alert(
                'error',
                'Sorry..! You can only fetch 2 activities at a time',
            );
        }

        // try {
        //     $this->rateLimit(2);
        // } catch (TooManyRequestsException $exception) {
        //     return $this->alert(
        //         'error',
        //         'You can only request 2 times',
        //     );

        // }
        $this->limit = $id;
    }

    public function render()
    {
        $activity = Activity::with('user')->paginate(10);
      //  dd($activity);
        return view('livewire.admin-dashboard', ['activity' => $activity]);
    }
}
