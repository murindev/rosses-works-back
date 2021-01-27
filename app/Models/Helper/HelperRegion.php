<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Helper\HelperRegion
 *
 * @property int $id
 * @property string|null $region
 * @property string|null $area
 * @property string|null $city
 * @property int|null $code
 * @property string|null $phone
 * @property string|null $center_lat
 * @property string|null $center_lon
 * @property int $zoom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereCenterLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereCenterLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelperRegion whereZoom($value)
 * @mixin \Eloquent
 */
class HelperRegion extends Model
{
    //
//    protected $connection = 'mysqlTest';
    protected $table = 'helper_regions';
}
