<?php


namespace App\Modules\CRM\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\CRM\Models\Implement;
use Carbon\Carbon;

class MasterController extends Controller
{
    public function implementsByMonth(){
        return Implement::with($this->with)->where('master',request()->get('masterId'))
            ->whereBetween('start_date', [Carbon::make(request()->get('firstDate')), Carbon::make(request()->get('lastDate'))])
            ->orderBy('start_date')
            ->get();
//        return request()->toArray();
    }
}
