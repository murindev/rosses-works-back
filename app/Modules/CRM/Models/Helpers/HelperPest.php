<?php

namespace App\Modules\CRM\Models\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\CRM\Models\Helpers\HelperPest
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string|null $name
 * @property string|null $methods
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereMethods($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperPest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HelperPest extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'helper_pests';



    public function getMethodsAttribute(){
        return explode(',',$this->attributes['methods']);
    }




}
