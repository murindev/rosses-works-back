<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserRole
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereActive($value)
 */
class UserRole extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];
}
