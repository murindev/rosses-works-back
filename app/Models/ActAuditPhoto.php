<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ActAuditPhoto
 *
 * @property int $id
 * @property int|null $act_id
 * @property int|null $cnt
 * @property string $store Место хранения
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto whereActId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto whereCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto whereStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActAuditPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActAuditPhoto extends Model
{
    protected $guarded = [];

}
