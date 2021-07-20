<?php


namespace App\Modules\CRM\Models;


use App\Modules\CRM\Models\Helpers\HelperArea;
use App\Modules\CRM\Models\Helpers\HelperMethod;
use App\Modules\CRM\Models\Helpers\HelperPest;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'volumes';

    public function getMethodAttribute(){
        return HelperMethod::whereIn('id',explode(',',$this->attributes['method']))->get();
    }

    public function pest(){
        return $this->hasOne(HelperPest::class,'id','pest');
    }
    public function squareEntity(){
        return $this->hasOne(HelperArea::class,'id','entity');
    }
}
