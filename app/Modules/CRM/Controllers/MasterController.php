<?php


namespace App\Modules\CRM\Controllers;


use App\Http\Controllers\Controller;
use App\Models\ActAuditPhoto;
use App\Models\ActExecution;
use App\Models\ActExecutionLocation;
use App\Modules\CRM\Models\Implement;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class MasterController extends Controller
{

    public $with = ['act.auditPhoto', 'act.volumes.squareEntity', 'act.volumes.pest'];

//

    public function implementsByMonth()
    {
        return Implement::with($this->with)->where('master', request()->get('masterId'))
            ->whereBetween('start_date', [Carbon::make(request()->get('firstDate')), Carbon::make(request()->get('lastDate'))])
            ->orderBy('start_date')
            ->get();
    }


    public function implementsByDay()
    {
        $date = request()->get('date') != null ? request()->get('date') : date("Y-m-d");
        $implementList = Implement::with($this->with)
            ->whereBetween('start_date', [Carbon::make($date), Carbon::make($date)->add(1, 'day')])
            ->where('master', request()->get('master'))->orderBy('start_date');
        return $implementList->get();
    }


    public function implementById()
    {
        $implement = Implement::with($this->with)->where('id', request()->get('id'))->first()->toArray();
        $implement['act']['execution'] = ActExecution::firstOrCreate(['act_id' => $implement['parent']])->toArray();
        $implement['act']['audit_photos'] = ActAuditPhoto::where('act_id',$implement['parent'])->get();
        return $implement;
    }

    protected function geoLocation($action){
        ActExecutionLocation::create([
            'act_id' => request('act_id'),
            'action' => $action,
            'lat' => request('lat'),
            'lon' => request('lon'),
        ]);
    }

    public function onStepDeparture(){
        try {
            ActExecution::where('act_id', request()->get('act_id'))->update(['departure' => now(),'step' => 1]);
            if(request()->get('lat')){
                $this->geoLocation('departure');
            }
        } catch  (\Exception $er) {
            return $er;
        }

        return $this->implementById();
    }

    public function onStepArrived(){
        try {
            ActExecution::where('act_id', request()->get('act_id'))->update(['arrived' => now(),'step' => 2]);
            if(request()->get('lat')){
                $this->geoLocation('arrived');
            }
        } catch  (\Exception $er) {
            return $er;
        }
        return $this->implementById();
    }

    public function onStepAudit(){
        try {
            ActExecution::where('act_id', request()->get('act_id'))->update(['audit' => now(),'step' => 3]);
            if(request()->get('lat')){
                $this->geoLocation('audit');
            }
        } catch  (\Exception $er) {
            return $er;
        }
        return $this->implementById();
    }

    public function onAuditPhotoSave(){
        $file = request()->file('file');
        $file->move(public_path() . "/storage/audit/photo/", $file->getClientOriginalName());
        $implement = $this->implementById();
        ActAuditPhoto::create(['act_id' => $implement['parent'],'photo' => $file->getClientOriginalName()]);
    }

    public function onContractFileSave(){
        $file = request()->file('file');
        $file->move(public_path() . "/storage/audit/act/", $file->getClientOriginalName());
        $implement = $this->implementById();
        ActExecution::whereActId($implement['parent'])->update(['contract' => $file->getClientOriginalName(),'step' => 4]);
    }

    public function onRecordSave(){
        $file = request()->file('file');
        $file->move(public_path() . "/storage/audit/record/", $file->getClientOriginalName());
        $implement = $this->implementById();
        ActExecution::whereActId($implement['parent'])->update(['record_file' => $file->getClientOriginalName()]);
    }

    public function onStepFinished(){
        try {
            ActExecution::where('act_id', request()->get('act_id'))->update(['finished' => now(),'step' => 5]);
            if(request()->get('lat')){
                $this->geoLocation('finished');
            }
        } catch  (\Exception $er) {
            return $er;
        }
        return $this->implementById();
    }


}
