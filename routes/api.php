<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cas.auth')->group(function () {
    Route::get('users', function(Request $request) {
        $user = \App\Models\User::find($request->userId);
        return response()->json($user, 200);
    });
});


Route::get('checklogin', function (Request $request) {
    if(!cas()->isAuthenticated()) {
			return false;
		}
		$response['user'] = cas()->user();
		$response['roles'] = ['admin_super', 'admin', 'editor_super'];
		return response()->json($response);
});

//Route::middleware('cas.auth')->group(function () {
//	Route::get('validateticket', function (Request $request) {
//		cas()->authenticate();
//		$ticket = $request->ticket;
//		return response()->json($ticket);
//	});
//});

//Route::get('validate', function (Request $request) {
//	cas()->authenticate();
////	cas()->setAttributes();
////	$ticket = $request->ticket;
//	return response()->json(cas()->isAuthenticated());
//});



//Route::get('checklogin', function (Request $request) {
//	if( ! cas()->checkAuthentication() )
//	{
//		if ($request->ajax()) {
//			return response('Unauthorized.', 401);
//		}
//		cas()->authenticate();
//
//	}
//	session()->put('cas_user', cas()->user() );
//	return response()->json("tacos");
//});
