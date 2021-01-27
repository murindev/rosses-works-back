<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserProfileEducation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $profile_id
 * @property string|null $institution Учебное заведение
 * @property string|null $speciality Специальность
 * @property string|null $date_admission Дата поступления
 * @property string|null $date_graduation Дата окончания
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereDateAdmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereDateGraduation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereSpeciality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEducation whereUserId($value)
 */
class UserProfileEducation extends Model
{
    protected $guarded = [];
}
