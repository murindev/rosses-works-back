<?php

namespace App\Http\Controllers\User;

use App\Events\ChangeUserAttributesEvent;
use App\Events\PrivateEvent;
use App\Helpers\FilterIndex;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\UserRank;
use App\Models\User\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserController extends Controller
{

    private $with = ['region','profile','userRank']; // 'userRoles',

    public function index(Request $request)
    {
        $filteredList = new FilterIndex($request);

        return $filteredList->complexFilter(User::with($this->with));
    }


    public function store(Request $request)
    {
      User::updateOrCreate(['id' => $request->input('id')],$request->all());


        $collection = new Collection();
        $user = User::where('id',$request->input('id'))->first();

        $collection->put('id',$user->id);
        $collection->put('crm_id',$user->crm_id);
        $collection->put('active',$user->active);
        $collection->put('name',$user->name);
        $collection->put('surname',$user->surname);
        $collection->put('email',$user->email);
        $collection->put('roles',$user->roles);
        $collection->put('rank_id',$user->rank_id);
        $collection->put('color',$user->color);
        $collection->put('text_color',$user->text_color);
        $collection->put('city',$user->city);
        $collection->put('shift',$user->shift);
        $collection->put('timeline',$user->timeline);
        $collection->put('avatar',$user->avatar);
        $collection->put('phone',$user->phone);
        $collection->put('salary',$user->salary);
        $collection->put('salary',$user->salary);
        $collection->put('percent',$user->percent);
        $collection->put('percent_limit',$user->percent_limit);
        $collection->put('task_admin',$user->task_admin);
        $collection->put('banned',$user->banned);
        $collection->put('role',UserRole::where('id',(int)$user->roles[0])->first());
        $collection->put('rank',UserRank::where('id',(int)$user->rank_id)->first());

      event( new ChangeUserAttributesEvent($request->input('id'), $collection));

    }

    public function show($id)
    {
        return User::whereId($id)->first();
    }


    public function destroy($id)
    {
        return User::whereId($id)->delete();
    }



}
