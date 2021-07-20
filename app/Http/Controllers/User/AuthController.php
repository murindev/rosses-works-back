<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\User\UserProfile;
use App\Models\User\UserRank;
use App\Models\User\UserRole;
use App\Models\User\UserTempPhone;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'phone','phoneConfirmation','passUpdate']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function phone(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:11',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $registered = User::where('phone',$request->phone)->first();
        if($registered && $registered->banned){
            abort(403);
        } elseif ($registered){
            $request['user_id'] =  $registered->id;
        }
        $response = Http::get('https://smsc.ru/sys/send.php?login=rosses&psw=Electro777&phones='.$request->phone.'&mes=code&call=1&fmt=3');

        $request['code'] = substr($response->json()['code'],2);
//        $request['code'] = substr('123456',2);

         UserTempPhone::create($request->all());

        return true;

    }

    public function phoneConfirmation(Request $request){
        $tmpUser = UserTempPhone::where('phone',$request->phone)->where('code',$request->code)->first();
        if($tmpUser && $tmpUser->user_id){
            $user = User::whereId($tmpUser->user_id)->select(['name','surname','email','phone'])->first();
            return response()->json([
                'message' => 'User previously registered',
                'user' => $user
            ], 206);
        } elseif($tmpUser) {
            return true;
        } else {
            try {
                UserTempPhone::where('phone', $request->phone)->delete();
            } catch (\Exception $e) {
                return  $e;
            }
            abort(406);
        }
    }

    public function passUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|min:6', // |confirmed
        ]);

        // update user
        $user = User::where('phone',$request->phone)->update(['password' => bcrypt($request->password)]);

        if($user){
            return true;
        } else {
            abort(404);
        }
    }

    /**
     * Register a User.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'surname' => 'required|string|between:2,100',
            'phone' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6', // |confirmed
        ]);

        $roles =  $request->roles ? (int)$request->roles : 3;
        $rank_id =  $request->rank_id ? (int)$request->rank_id : 1;

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)],
            ['roles' => [$roles]],
            ['rank_id' => $rank_id]
        ));

        if($user){
            UserTempPhone::where('phone',$request->phone)->delete();
            UserProfile::create(['user_id' => $user->id]);
        }



        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }



    public function getUserWithAttributes($id){
        $collection = new Collection();
        $user = User::where('id',$id)->first();

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

        return $collection;

    }




    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $this->getUserWithAttributes(auth()->user()->id)
        ]);
    }

}
