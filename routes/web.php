<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::any('/login',['as' => 'login', 'uses',function () {
    return '
    <form method="post" action="/api/auth/login">
    <input type="email" name="email" placeholder="login"/> <br/>
    <input type="password" name="password" placeholder="password"/> <br/>
    <button type="submit">dsdasd</button>
</form>


    ';
}] );*/
//Route::get('/laravel-websockets', function () {
//    return view('welcome');
//});


Route::get('/test', function (){
//
//    $g = new \App\Http\Controllers\User\UserProfileController;
//    dump($g->columns());

//    $client = new GuzzleHttp\Client();
//    $res = $client->get('https://smsc.ru/sys/send.php?login=rosses&psw=Electro777&phones=79298297060&mes=code&call=1&fmt=3');
//
//    dump($res);
//    dump($res->getBody());

//    $response = Http::get('https://smsc.ru/sys/send.php?login=rosses&psw=Electro777&phones=79298297060&mes=code&call=1&fmt=3');

//    dump($response->json());

    $rr = new \App\Http\Mobile\ProfileController;

    dump($rr->show2()->toArray());

});
