<?php

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

Route::get('/','HomeController@index')->name('welcome');
Route::get('/phone/{msisdn}','HomeController@test')->name('price');
Route::get('myvideos','HomeController@allVideo')->name('myvideos');
Route::get('subRequest/{msisdn}/{package}','GPSubscriptionController@subRequest')->name('gp.subRequest');
Route::get('gp_success/','GPSubscriptionController@success')->name('gp.success');
Route::get('gp_failed/','GPSubscriptionController@failed')->name('gp.failed');
Route::get('cancel/','GPSubscriptionController@cancelled')->name('gp.cancelled');
Route::get('faq','HomeController@faq')->name('faq');
Route::get('story','HomeController@story')->name('story');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
//Route::get('/subscription/check/{uid}',function ($uid){
//    $phone = $uid;
////    dd($uid);
//    $check = \Illuminate\Support\Facades\DB::select(DB::raw("select (case when(count(*)>0) then '1' else '0' end) as status from leenbo.subscription_detail where subno='$phone' and renew!='N';"));
//    dd($check[0]);
//    if($check[0] == 1){
//        echo json_encode(array('status' => true));
//    }else{
//        echo json_encode(array('status' => false));
//    }
//});
Route::post('/subscription/check',function (\Illuminate\Http\Request $request){

    $phone = $request->uid;
    $check = \Illuminate\Support\Facades\DB::select(DB::raw("select (case when(count(*)>0) then '1' else '0' end) as status from leenbo.subscription_detail where subno='$phone' and renew!='N';"));
    if ($check[0]->status == '1'){
        session()->flash('successMsg','You have successfully logged in! enjoy & learn by watching amazing videos!');
        session()->put('msisdn',$phone);
        session()->put('subscription',true);
        return response()->json(['status'=>true]);
    }else{
        return response()->json(['status'=>false]);
    }
});
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){

   Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
   Route::resource('slider','SliderController');
   Route::resource('category','CategoryController');
   Route::resource('item','ItemController');
   Route::get('reservation','reservationController@index')->name('reservation.index');
   Route::get('reservation/{id}','reservationController@status')->name('reservation.status');
   Route::post('reservation/{id}','reservationController@destroy')->name('reservation.destroy');
   Route::resource('settings','SettingsController');
   Route::resource('price','PriceController');
   Route::resource('sampleVideo','SampleVideoController');

});
