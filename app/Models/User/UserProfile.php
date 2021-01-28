<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $photo
 * @property string $name
 * @property string $patronymic
 * @property string $surname
 * @property string $birth_date
 * @property string $birth_place
 * @property string $address_residence
 * @property string $address_registration
 * @property string $phone_home
 * @property string $phone_mobile
 * @property string $phone_office
 * @property string $passport_data
 * @property string $maritals_tatus
 * @property string $education_additional
 * @property string $languages
 * @property string $salary_for_probation
 * @property string $salary_after_probation
 * @property string $advantages
 * @property string $hobbies
 * @property string $additional_info
 * @property int $agreement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $military_status
 * @property int|null $crm_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserProfileEducation[] $Educations
 * @property-read int|null $educations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserProfileEmployment[] $Employments
 * @property-read int|null $employments_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAdditionalInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAddressRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAddressResidence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAdvantages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAgreement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCrmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereEducationAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereHobbies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMaritalsTatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMilitaryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePassportData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhoneHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhoneMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhoneOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSalaryAfterProbation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSalaryForProbation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $marital_status Семейное положение
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserProfileEducation[] $education
 * @property-read int|null $education_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserProfileEmployment[] $employments
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMaritalStatus($value)
 */
class UserProfile extends Model
{
    protected $guarded = [];

    public function education(){
        return $this->hasMany(UserProfileEducation::class,'profile_id');
    }
    public function employments(){
        return $this->hasMany(UserProfileEmployment::class,'profile_id');
    }
}
