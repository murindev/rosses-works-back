<?php


namespace App\Modules\CRM\Models;


use App\Models\ActAuditPhoto;
use App\Models\ActExecution;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\CRM\Models\Act
 *
 * @property int $id
 * @property int|null $parent
 * @property int|null $reserved
 * @property string|null $act_nr
 * @property int|null $statistic_id
 * @property int|null $creator
 * @property int|null $subact
 * @property int $subact_type
 * @property string|null $contact
 * @property string|null $phone
 * @property string|null $phone_sub
 * @property string|null $phone_ext_sub
 * @property string|null $phone_ext
 * @property int $floating
 * @property string|null $floating_date_from
 * @property string|null $floating_date_to
 * @property string|null $prefer_time_from
 * @property string|null $prefer_time_to
 * @property int $finished
 * @property int $paid
 * @property int $booking_act_signed
 * @property int $booking_act_transferred
 * @property string|null $booking_act_file
 * @property int $implement_act_signed
 * @property string|null $implement_act_file
 * @property string|null $address
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $destination
 * @property string|null $region
 * @property int|null $cash
 * @property int|null $cashless
 * @property int $cash_tag
 * @property int $cashless_tag
 * @property int|null $property_type
 * @property string|null $contact_name
 * @property string|null $comment
 * @property float|null $cost_remedy
 * @property float|null $cost_transport
 * @property float|null $cost_labor
 * @property int $card_payment
 * @property int $overpay
 * @property string $overpay_rest
 * @property int $contractor_fee
 * @property string $contractor_fee_cash
 * @property string $contractor_fee_cashless
 * @property int $pay_back
 * @property string $pay_back_cash
 * @property string $pay_back_cashless
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read ActAuditPhoto|null $auditPhoto
 * @property-read ActExecution|null $execution
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\CRM\Models\Implement[] $implement
 * @property-read int|null $implement_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\CRM\Models\Volume[] $volumes
 * @property-read int|null $volumes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Act newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Act newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Act query()
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereActNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereBookingActFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereBookingActSigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereBookingActTransferred($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCardPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCashTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCashless($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCashlessTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereContractorFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereContractorFeeCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereContractorFeeCashless($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCostLabor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCostRemedy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCostTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereCreator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereFloating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereFloatingDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereFloatingDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereImplementActFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereImplementActSigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereOverpay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereOverpayRest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePayBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePayBackCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePayBackCashless($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePhoneExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePhoneExtSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePhoneSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePreferTimeFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePreferTimeTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereReserved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereStatisticId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereSubact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereSubactType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Act whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Act extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'acts';

    public function implement()
    {
        return $this->hasMany(Implement::class,'parent');
    }

    public function volumes()
    {
        return $this->hasMany(Volume::class,'parent');
    }
    public function execution(){
        return $this->hasOne(ActExecution::class,'act_id');
    }

    public function auditPhoto(){
        return $this->hasOne(ActAuditPhoto::class,'act_id');
    }

}
