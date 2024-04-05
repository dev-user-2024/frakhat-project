<?php
//asiye
use App\Http\Controllers\api\categoryCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\administrator\panelController as AdminPanelController;
use App\Http\Controllers\Payment\InvoiceController;
use App\Http\Controllers\Payment\verifyController;
use Modules\CartItem\Http\Controllers\FeeController;

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
    if (auth()->check()){
        return  redirect()->to('/admin/dashboard');
    }else{
        return view('auth.login');

    }
});
//Route::get('/change-password',[App\Http\Controllers\HomeController::class,"change_password"]);
//Route::get('/payment_gateway',[App\Http\Controllers\HomeController::class,"payment_gateway"])->name('payment_gateway');
//Route::get('/verify_payment_gateway',[App\Http\Controllers\HomeController::class,"verify_payment_gateway"])->name('verify_payment_gateway');
//Route::get('/register_users',[App\Http\Controllers\HomeController::class,"register_users"])->name('register_users');
//
//Route::get('/purchase',[InvoiceController::class,'create_purchase'])->name('purchase');
//Route::get('/verify',[ verifyController::class,'verify'])->name('verify');

Auth::routes();

Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\administrator','middleware' => 'auth'],function (){
//    Route::get('admin_profile','panelController@admin_profile')->name('AdminProfile');
//    Route::get('user_profile','panelController@user_profile')->name('AdminProfile');
//    Route::get('reporter_profile','panelController@reporter_profile')->name('ReporterProfile');
//    Route::get('marketer_profile','panelController@marketer_profile')->name('MarketerProfile');
//    Route::get('teacher_profile','panelController@teacher_profile')->name('teacher_profile');
//

//    Route::put('change_password','panelController@change_password');
//    Route::get('reporter_list','panelController@reporter_list')->name('reporterList');
//    Route::get('admin_list','panelController@admin_list')->name('adminList');
//    Route::get('marketer_list','panelController@marketer_list')->name('marketer_list');
//    Route::get('user_create','panelController@user_create')->name('usersCreate');
//    Route::get('user_list','panelController@user_list')->name('usersList');
//    Route::get('contactUs','panelController@contactUs')->name('contactUs');
//    Route::get('setting_list','panelController@setting_list')->name('setting_list');
//    Route::get('setting_edit/{id}','panelController@setting_edit')->name('settingEdit');
//    Route::get('social_list','panelController@social_list')->name('socialList');
//    Route::get('social_edit/{id}','panelController@social_edit')->name('socialEdit');
//    Route::get('page_create','panelController@page_create')->name('pageCreate');
//    Route::get('page_list','panelController@page_list')->name('pageList');
//    Route::get('page_edit/{id}','panelController@page_edit')->name('pageEdit');
//    Route::get('video_create','panelController@video_create')->name('videoCreate');
//    Route::get('video_list','panelController@video_list')->name('videoList');
//    Route::get('video_edit/{id}','panelController@video_edit')->name('videoEdit');
//    Route::get('adverting_create','panelController@adverting_create')->name('advertingcreate');
//    Route::get('adverting_list','panelController@adverting_list')->name('advertingList');
//    Route::get('adverting_edit/{id}','panelController@adverting_edit')->name('advertingEdit');
//    Route::get('login_id/{user_id}','panelController@login_id')->name('login_id');
//    Route::get('logout_st','panelController@impersonateleave_st')->name('impresent_leave');
//    Route::get('trachonesh_user_list','panelController@trachonesh_user_list')->name('trachoneshUserList');
//    Route::get('order_user_list','panelController@order_user_list')->name('OrderUserList');
//    Route::get('order_detail/{id}','panelController@order_detail')->name('orderDetail');
//    Route::get('trachonesh_admin_list','panelController@trachonesh_admin_list')->name('trachonesh_admin_list');
//    Route::get('menu_create','panelController@menu_create')->name('MenuCreate');
//    Route::get('menu_list','panelController@menu_list')->name('MenuList');
//    Route::get('banner_create','panelController@banner_create')->name('MenuList');
//    Route::get('teacher_list','panelController@teacher_list')->name('teacher_list');
//    Route::get('teacher_info/{id}','panelController@teacher_info')->name('teacher_info');
//
//    Route::get('role_category_users_create','panelController@role_category_users_create')->name('role_category_users_create');
//    Route::get('role_category_users_list','panelController@role_category_users_list')->name('role_category_users_list');
//
//    //Courses
//
//    Route::get('discount_code_create','panelController@discount_code_create')->name('discountCreate');
//    Route::get('discount_code_list','panelController@discount_code_list')->name('discountList');
//    Route::get('discount_code_edit/{id}','panelController@discount_code_edit')->name('discountEdit');
//
    //Jobs
//
//    Route::resource('Company', 'CompaniesController');
//    Route::resource('Job', 'JobsController');




    Route::get('dashboard','panelController@panel')->name('panel');

    Route::resource('course','CourseController');
    Route::resource('course_category','CourseCategoryController');
//    Route::get('season_course_list/{id}','panelController@season_course_list')->name('seasonCourseList');
//    Route::get('season_create','panelController@season_create')->name('seassonCreate');
//    Route::get('teacher_courses','panelController@teacher_courses')->name('teacher_courses');
//    Route::get('season_course_list/{id}','panelController@season_course_list')->name('seasonCourseList');
//    Route::get('season_create','panelController@season_create')->name('seassonCreate');
//    Route::get('teacher_courses','panelController@teacher_courses')->name('teacher_courses');


//    Route::get('/purchase',[FeeController::class,'create_purchase'])->name('purchase');
//    Route::get('/verify',[ FeeController::class,'verify'])->name('verify');
//
//    Route::get('/payment_gateway',[FeeController::class, 'paymentCreate'])->name('payment_gateway');
//    Route::get('/verify_payment_gateway',[FeeController::class, 'paymentResult'])->name('verify_payment_gateway');

});



