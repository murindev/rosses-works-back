<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserTempPhone
 *
 * @property int $id
 * @property int $phone
 * @property int $code
 * @property int|null $user_id
 * @property int $roles
 * @property int $rank_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereRankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereRoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTempPhone whereUserId($value)
 * @mixin \Eloquent
 */
class UserTempPhone extends Model
{
    protected $guarded = [];
}
