<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    private $data;

    public function index()
    {
        $this->data = \request()->get('data') ? \request()->get('data') : '';
        return call_user_func_array([__CLASS__, \request()->get('func')], [$this->data]);
    }

    public function columnComments()
    {
        $columnComments = new Collection();
        foreach ($this->data as $tableName) {
            $tableName = explode('||',$tableName);
            $condition = isset($tableName[1]) && $tableName[1] == 'all' ? '' : 'column_comment != "" and';
            $fields = \DB::select('
        select column_name, column_default, column_comment from information_schema.columns
        where '.$condition.'  table_schema = ? and table_name = ? ', [env('DB_DATABASE', 'cv05345_roscrm'), $tableName[0]]
            );
            $columnComments->put($tableName[0], collect($fields)->pluck('column_comment', 'column_name'));
        }

        return $columnComments;
    }
}
