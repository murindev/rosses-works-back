<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserRoleSet;
use Illuminate\Http\Request;


class UserRoleSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserRoleSet[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return UserRoleSet::all();
    }

    /**
     * Display the specified resource.
     *
     * @param UserRoleSet $userRoleSet
     * @return UserRoleSet
     */
    public function show(UserRoleSet $userRoleSet)
    {
        return $userRoleSet;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UserRoleSet|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        return UserRoleSet::updateOrCreate($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserRoleSet  $userRoleSet
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRoleSet $userRoleSet)
    {
        //
    }
}
