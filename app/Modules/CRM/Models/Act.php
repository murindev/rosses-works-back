<?php


namespace App\Modules\CRM\Models;


use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'acts';
}
