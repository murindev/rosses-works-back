<?php

namespace App\Modules\CRM\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CRM\Models\Act;

/**
 * App\Modules\CRM\Models\Implement
 *
 * @property int $id
 * @property int|null $parent
 * @property int|null $lid_id
 * @property string|null $date
 * @property int|null $master
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $note
 * @property int|null $reason
 * @property-read Act|null $act
 * @method static \Illuminate\Database\Eloquent\Builder|Implement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Implement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Implement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereLidId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Implement whereUser($value)
 * @mixin \Eloquent
 */
class Implement extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'implements';

    public function act(){
        return $this->belongsTo(Act::class,'parent');
    }





}
