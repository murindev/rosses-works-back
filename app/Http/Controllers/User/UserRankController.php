<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserRank;
use Illuminate\Http\Request;

class UserRankController extends Controller
{
    public function index(){
        return UserRank::all();
    }
}
