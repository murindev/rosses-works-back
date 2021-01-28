<?php

namespace App\Models\User;

use App\Models\Helper\HelperRegion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $roles
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $active
 * @property int $task_admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
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
 * @mixin \Eloquent
 * @property-read HelperRegion|null $region
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoles($value)
 * @property-read \App\Models\User\UserProfile|null $profile
 * @property int $rank_id Разряд
 * @property int $banned Код верификации
 * @property-read \App\Models\User\UserRank|null $userRank
 * @property-read Collection|\App\Models\User\UserRole[] $userRoles
 * @property-read int|null $user_roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRankId($value)
 * @property int|null $crm_id
 * @property string|null $surname
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCrmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }


    public function setRolesAttribute($value){
        $this->attributes['roles'] = implode(',',$value);

    }
    public function getRolesAttribute($value){
        return explode(',',$this->attributes['roles']);

    }

    public function userRoles(){
        return $this->hasMany(UserRole::class,'id','roles');
    }

    public function userRank(){
        return $this->hasOne(UserRank::class,'id','rank_id');
    }

    public function region(){
        // @TODO-cdnadom:  -> HelperRegion   city -> city_id
        return $this->hasOne(HelperRegion::class,'code','city');
    }

    public function profile(){
        return $this->hasOne(UserProfile::class);
    }


}
