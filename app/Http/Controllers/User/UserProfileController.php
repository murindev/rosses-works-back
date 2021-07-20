<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserProfile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function columns()
    {
        $fieldsets = new Collection();
        $profile = \DB::select('
        select column_name, column_default, column_comment from information_schema.columns
        where column_comment != "" and table_schema = ? and table_name = ? ', [ env('DB_DATABASE', 'cv05345_roscrm'), 'user_profiles']
        );
        $fieldsets->put('profile',collect($profile)->pluck('column_comment', 'column_name'));

        $educations = \DB::select('
        select column_name, column_default, column_comment from information_schema.columns
        where column_comment != "" and table_schema = ? and table_name = ? ', [env('DB_DATABASE', 'cv05345_roscrm'), 'user_profile_education']
        );
        $fieldsets->put('education',collect($educations)->pluck('column_comment', 'column_name'));

        $employments = \DB::select('
        select column_name, column_default, column_comment from information_schema.columns
        where column_comment != "" and table_schema = ? and table_name = ? ', [env('DB_DATABASE', 'cv05345_roscrm'), 'user_profile_employments']
        );
        $fieldsets->put('employment',collect($employments)->pluck('column_comment', 'column_name'));

        return $fieldsets;

    }

    public function index()
    {
    }

    public function show($id)
    {
        return UserProfile::whereId($id)->with('education','employments')->first();
    }
}
