<?php


namespace App\Models;


use App\Modules\CRM\Models\Act;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ActExecution
 *
 * @property int $id
 * @property int $act_id
 * @property string|null $departure
 * @property string|null $arrived
 * @property string|null $audit
 * @property string|null $contract
 * @property string|null $finished
 * @property int $step
 * @property string|null $record_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereActId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereArrived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereAudit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereDeparture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereRecordFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActExecution whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActExecution extends Model
{
    protected $guarded = [];

    public function act(){
        return $this->belongsTo(Act::class,'act_id', 'id');
    }

}
