<?php

namespace App\Modules\CRM\Models\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\CRM\Models\Helpers\HelperMethod
 *
 * @property int $id
 * @property int $sort
 * @property string|null $name
 * @property int|null $cost
 * @property int|null $unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HelperMethod extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'helper_methods';
}
