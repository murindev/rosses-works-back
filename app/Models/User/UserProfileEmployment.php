<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserProfileEmployment
 *
 * @property int $id
 * @property int $user_id
 * @property int $profile_id
 * @property string $date_of_employment
 * @property string $date_of_dismissal
 * @property string $organisation
 * @property string $position
 * @property string $address_of_organisation
 * @property string $reason_for_dismissal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereAddressOfOrganisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereDateOfDismissal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereDateOfEmployment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereOrganisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereReasonForDismissal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfileEmployment whereUserId($value)
 * @mixin \Eloquent
 */
class UserProfileEmployment extends Model
{
    protected $guarded = [];
}
