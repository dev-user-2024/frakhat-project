<?php

use App\Http\Controllers\administrator\DiscountController;
use App\Http\Controllers\api\adverstingController;
use App\Http\Controllers\api\apiController;
use App\Http\Controllers\api\auth\authController;
use App\Http\Controllers\api\categoryCourseController;
use App\Http\Controllers\api\courseController;
use App\Http\Controllers\api\front_end\indexController as FrontEndIndexController;
use App\Http\Controllers\api\front_end\userController as FrontEndUserController;
use App\Http\Controllers\api\front_end\newsController as FrontEndNewsController;
use App\Http\Controllers\api\pagesController;
use App\Http\Controllers\api\seasoncourseController;
use App\Http\Controllers\api\videoController;
use Illuminate\Support\Facades\Route;
use Modules\CartItem\Http\Controllers\FeeController;

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

//Route::group(['prefix'=>"auth"],function (){
//    Route::post('sentCode',[authController::class,'sentLoginCode']);
//    Route::post('loginWithCode',[authController::class,'loginWithCode']);
//    Route::post('login',[authController::class,'loginUsers']);
//    Route::post('register_reporter',[authController::class,'register_reporter']);
//    Route::post('register_user',[authController::class,'register_user']);
//
//    Route::group(['middleware'=>"auth:sanctum"],function (){
//        Route::post('logout',[authController::class,'logoutUsers']);
//        Route::post('build_code',[authController::class,'build_code']);
//        Route::post('build_code_check',[authController::class,'build_code_check']);
//    });
//});

//Route::group(['prefix'=>'reporter','middleware'=>"auth:sanctum"],function (){
//    Route::put('update_reporter',[apiController::class,'UpdateReporter']);
//
//        Route::resource('news', FrontEndNewsController::class);
//
//
//});

//Route::group(['prefix'=>'admin','middleware'=>"auth:sanctum"],function (){
//    Route::get('teacher_courses',[apiController::class,'teacher_courses']);
//    Route::patch('teacher_courses_status/{id}',[apiController::class,'teacher_courses_status']);
//
//    Route::get('discount_admin_list',[discountController::class,'discount_admin_list']);
//
//    Route::group(['prefix'=>'news'],function (){
////        Route::resource('news_slider',sliderNewsController::class);
////        Route::resource('news_category',categoryNewsController::class);
//
//    Route::resource('video_news',videoController::class);
//    });
//
//    Route::get('marketing_pay/{id}',[apiController::class,'marketing_pay']);
//
//    Route::resource('pages',pagesController::class);
//    Route::resource('advertising',adverstingController::class);
//    Route::put('update_admin',[apiController::class,'update_admin']);
//    Route::put('update_marketer',[apiController::class,'update_marketer']);
//    Route::put('update_teacher',[apiController::class,'update_teacher']);
//    Route::put('percent_teacher/{user_id}',[apiController::class,'percent_teacher']);
//    Route::post('save_default_course',[apiController::class,'save_default_course']);
//
//    Route::group(['prefix'=>'course','as'=>'course.'],function (){
//        Route::resource('season_course',seasoncourseController::class);
//        Route::patch('true_status/{id}',[apiController::class,'true_status']);
//    });
//
//    Route::get('contactus_list',[apiController::class,'contactus_list']);
//
//    Route::delete('contactus_delete/{id}',[apiController::class,'contactus_delete']);
//
//    Route::get('setting_website_list',[apiController::class,'setting_website_list']);
//    Route::put('setting_website/{id}',[apiController::class,'setting_website']);
//
//    Route::get('social_media_list',[apiController::class,'social_media_list']);
//    Route::put('social_media/{id}',[apiController::class,'social_media']);
//
//    Route::get('trachonesh_admin',[apiController::class,'trachonesh_admin']);
//
//    Route::post('menu_save',[apiController::class,'menu_save']);
//    Route::get('menu_list',[apiController::class,'menu_list']);
//    Route::delete('menu_Delete/{id}',[apiController::class,'menu_Delete']);
//
//    Route::group(['prefix'=>'users','as'=>'users.'],function (){
//        Route::get('admin_users',[apiController::class,'admin_users']);
//        Route::get('user_users',[apiController::class,'user_users']);
//        Route::get('marketer_users',[apiController::class,'marketer_users']);
//        Route::get('reporter_users',[apiController::class,'reporter_users']);
//        Route::post('user_create',[apiController::class,'user_create']);
//        Route::get('teacher_list',[apiController::class,'teacher_list']);
//        Route::delete('user_remove/{id}',[apiController::class,'user_remove']);
//    });
//
//});

Route::group(['prefix'=>'v1'],function (){

    //Course

//    Route::resource('category_course',categoryCourseController::class);
//    Route::resource('course',courseController::class);

//    Route::group(['prefix'=>'user','middleware'=>"auth:sanctum"],function (){
//        Route::get('/',[FrontEndUserController::class,'get_user']);
//        Route::put('update_user',[FrontEndUserController::class,'update']);
//        Route::get('order_list',[FrontEndUserController::class,'order_list']);
//        Route::get('trachonesh_list',[FrontEndUserController::class,'trachonesh_list']);
//        Route::get('my-courses',[FrontEndUserController::class,'authUserCourses']);
//        Route::get('my-courses/{id}',[FrontEndUserController::class,'courseSeasons']);
//    });


//    Route::get('video_list',[FrontEndIndexController::class,'video_list']);

//    Route::get('course_list',[FrontEndIndexController::class,'course_list']);
//    Route::get('single_course/{slug}',[FrontEndIndexController::class,'single_course']);

//
//    Route::get('single_page/{slug}',[FrontEndIndexController::class,'single_page']);
//    Route::get('social_media_list_homepage',[FrontEndIndexController::class,'social_media_list_homepage']);
//    Route::get('menu_list',[FrontEndIndexController::class,'menu_list']);

//    Route::post('teacher_register',[FrontEndIndexController::class,'teacher_register']);
//    Route::get('homepage_website',[FrontEndIndexController::class,'homepage_website']);
//
//    Route::get('banner_course',[FrontEndIndexController::class,'banner_course']);
//
//
//    //News
//
//    Route::get('index_news',[FrontEndNewsController::class,'index_news']);
//    Route::get('favorite_news',[FrontEndNewsController::class,'favorite_news']);
//    Route::get('visited_news',[FrontEndNewsController::class,'visited_news']);
//    Route::get('most_controversial',[FrontEndNewsController::class,'most_controversial']);
//    Route::get('hot_news',[FrontEndNewsController::class,'hot_news']);
//    Route::get('writer_word',[FrontEndNewsController::class,'writer_word']);
//    Route::get('adverting_sectionOne',[FrontEndNewsController::class,'adverting_sectionOne']);
//    Route::get('adverting_sectionTwo',[FrontEndNewsController::class,'adverting_sectionTwo']);
//    Route::get('video_list',[FrontEndNewsController::class,'video_list']);
//    Route::get('today_news',[FrontEndNewsController::class,'today_news']);
//    Route::get('gallery_news',[FrontEndNewsController::class,'gallery_news']);
//    Route::get('accidents_news',[FrontEndNewsController::class,'accidents_news']);
//    Route::get('sports_news',[FrontEndNewsController::class,'sports_news']);
//    Route::get('economical_news',[FrontEndNewsController::class,'economical_news']);
//    Route::get('social_news',[FrontEndNewsController::class,'social_news']);
//    Route::get('province_news',[FrontEndNewsController::class,'province_news']);
//    Route::get('international_news',[FrontEndNewsController::class,'international_news']);
//    Route::get('scientific_news',[FrontEndNewsController::class,'scientific_news']);
//    Route::get('cultural_news',[FrontEndNewsController::class,'cultural_news']);
//    Route::get('artistic_news',[FrontEndNewsController::class,'artistic_news']);
//    Route::get('others_news',[FrontEndNewsController::class,'others_news']);

//    Route::get('adverting_sidebar',[FrontEndNewsController::class,'adverting_sidebar']);

//    Route::post('payment_gateway/{id}',[FrontEndIndexController::class,'payment_gateway']);
//    Route::get('/purchase',[FeeController::class,'create_purchase'])->name('purchase');
//    Route::get('/verify',[ FeeController::class,'verify'])->name('verify');

    //course new api
    Route::get('course_list',[FrontEndIndexController::class,'course_list_new']);
    Route::get('single_course/{id}',[FrontEndIndexController::class,'single_course_new']);
    //end course new api

});

