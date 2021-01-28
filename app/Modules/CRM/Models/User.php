<?php

namespace App\Modules\CRM\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\CRM\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string|null $color
 * @property string|null $text_color
 * @property int|null $city
 * @property int $shift
 * @property int $timeline
 * @property string|null $avatar
 * @property string|null $phone
 * @property int|null $salary
 * @property int $percent
 * @property int $percent_limit
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $active
 * @property int $task_admin
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePercentLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereShift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTaskAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTimeline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'admin_users';

    protected $fillable = ['username','name','phone','active','city','color','text_color','password'];
}
