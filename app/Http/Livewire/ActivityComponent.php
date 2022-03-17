<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Activity;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
class ActivityComponent extends Component
{

    public $editable = false;
    public $activity_id;
    public $datas = [];
    public $activity_name;
    public $alerts = [];
    public $msg;
    public $limit;
    public $fetchlimit;
    public $total;

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
        $update = Activity::where('id',$id)->where('user_id',auth()->user()->id)->update(['activity'=>$activity]);

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

    public function more($id){

        $this->fetchlimit++;
        if($this->fetchlimit > 1){
           return $this->alert(
                'error',
                'Sorry..! You can only fetch 2 activities perday',
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
        $this->total = 2;
        $this->limit = $id;
    }

    public function render()
    {
        //$acticity = Activity::with('user')->latest()->take($this->limit ? $this->limit : 3)->get();
        $acticity = Activity::where('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->limit($this->total ? $this->total : 3)->offset($this->limit)->get();
        //dd($acticity);
        return view('livewire.activity-component', ['activity' => $acticity]);
    }
}
