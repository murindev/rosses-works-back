<?php

namespace App\Modules\CRM\Models\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\CRM\Models\Helpers\HelperArea
 *
 * @property int $id
 * @property string|null $name
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name_short
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea whereNameShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperArea whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HelperArea extends Model
{
    protected $connection = 'mysqlCRM';
    protected $table = 'helper_square';







}
