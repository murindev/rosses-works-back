<?php

namespace App\Modules\CRM\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\CRM\Models\User;
use App\Modules\CRM\Models\UserRole;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return User[]|Collection
     */
    public function index()
    {
//        dump(User::all()->toArray());
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return User|Builder|Model|object
     */
    public function show($id)
    {
        return User::whereId($id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function newUser($user)
    {
        return User::updateOrCreate(['username' => $user['email']],[
            'username' => $user['email'],
            'name' => $user['name'] . ' ' . $user['surname'],
            'phone' => $user['phone'],
            'active' => 1,
            'city' => 495,
            'color' => '#ff9800',
            'text_color' => '#ffffff',
            'password' => '$2y$10$jfMvWLcvsNrxe9oLu/SFmOpTHMCrA3Fj7pvkwau6Gyaqes7lFUSye',
        ])->id;
/*        $newUser = new User();
        $newUser->username = $user['email'];
        $newUser->name = $user['name'] . ' ' . $user['surname'];
        $newUser->phone = $user['phone'];
        $newUser->active = 1;
        $newUser->city = 495;
        $newUser->color = '#ff9800';
        $newUser->text_color = '#ffffff';
        $newUser->password = '$2y$10$jfMvWLcvsNrxe9oLu/SFmOpTHMCrA3Fj7pvkwau6Gyaqes7lFUSye';
        $newUser->save();
        return $newUser->id;*/
    }

    public function newUserRole($userId, $roles)
    {
        foreach ($roles as $role) {
            UserRole::updateOrCreate(['user_id' => $userId, 'role_id' => $role]);
        }
    }


    public function userToStaff(Request $request)
    {
        try {
            $userId = $this->newUser($request);
            $this->newUserRole($userId, $request['roles']);
            \App\Models\User\User::whereEmail($request['email'])->update(['crm_id' => $userId]);
            return $userId;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deactivateUser(Request $request)
    {
        try {
            User::whereUsername($request['email'])->update(['active' => 0]);
            return \App\Models\User\User::whereEmail($request['email'])->update(['crm_id' => 0]);
        } catch (\Exception $e) {
            return $e;
        }
    }


}

