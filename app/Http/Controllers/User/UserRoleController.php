<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserRole;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return UserRole[]|Collection
     */
    public function index(Request $request)
    {
        return UserRole::all();
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return UserRole[]|Collection
     */
    public function store(Request $request)
    {
        UserRole::updateOrCreate(['id' => $request->input('id')],$request->all());
        return $this->index($request);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return UserRole[]|Collection
     */
    public function destroy(Request $request)
    {
        try {
            UserRole::whereId($request->input('id'))->delete();
            return UserRole::all();
        } catch (Exception $e) {
            return $e;
        }
    }
}
