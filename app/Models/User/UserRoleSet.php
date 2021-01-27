<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserRoleSet
 *
 * @property int $role_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoleSet whereUserId($value)
 * @mixin \Eloquent
 */
class UserRoleSet extends Model
{
    protected $hidden = ['created_at','updated_at'];
}
