<?php

use Illuminate\Support\Facades\Route;
use Modules\ApiFront\Http\Controllers\AdBannerController;
use Modules\ApiFront\Http\Controllers\CommentController;
use Modules\ApiFront\Http\Controllers\ContactController;
use Modules\ApiFront\Http\Controllers\ContactMarketingController;
use Modules\ApiFront\Http\Controllers\ContactUsController;
use Modules\ApiFront\Http\Controllers\CourseController;
use Modules\ApiFront\Http\Controllers\JobController;
use Modules\ApiFront\Http\Controllers\MenuController;
use Modules\ApiFront\Http\Controllers\OrderController;
use Modules\ApiFront\Http\Controllers\PostController;
use Modules\ApiFront\Http\Controllers\PostLikeController;
use Modules\ApiFront\Http\Controllers\PostViewController;
use Modules\ApiFront\Http\Controllers\ResumeController;
use Modules\ApiFront\Http\Controllers\SubscriberController;


Route::get('menus', [MenuController::class, 'getMenuList']);
Route::get('section-post/{section}', [PostController::class, 'getPostList']);
Route::get('adBanners', [AdBannerController::class, 'getBannerList']);
Route::post('contact-us', [ContactController::class, 'store']);
Route::post('contact-frakhat', [ContactUsController::class, 'store']);

Route::get('post/{id}', [PostController::class, 'getPostDetails']);
Route::get('latest-posts/{limit}', [PostController::class, 'getLatestTextPosts']);
Route::get('latest-image-posts/{limit}', [PostController::class, 'getLatestImagePosts']);
Route::get('posts-category/{categoryId}', [PostController::class, 'getPostOfCategory'])->name('posts.list');
Route::get('posts-category-max-view/{categoryId}', [PostController::class, 'getPostOfCategoryView']);


Route::get('/latest-jobs', [JobController::class, 'getLatestJobs']);
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{id}', [JobController::class, 'show']);
//Route::get('/jobs/order-by-date', [JobController::class, 'orderByDate']);

Route::post('/resume', [ResumeController::class, 'store']);

Route::get('/jobs-search', [JobController::class, 'jobSearch']);
Route::get('/data-filter', [JobController::class, 'dataFilter']);
Route::get('/data-search', [JobController::class, 'dataSearch']);


Route::get('orders/{userId}/purchased-courses', [OrderController::class, 'getUserPurchasedCourses']);

Route::post('subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::post('contact-marketing', [ContactMarketingController::class, 'contactMarketing']);



Route::post('/posts/{id}/likes', [PostLikeController::class, 'store']);
Route::post('/posts/{id}/views', [PostViewController::class, 'store']);
Route::post('/posts/{post_id}/comments', [CommentController::class, 'store']);
Route::get('/posts/{post_id}/comments', [CommentController::class, 'index']);

Route::get('course-menus', [MenuController::class, 'getCourseMenuList']);
Route::get('/course-search', [CourseController::class, 'searchAllFields']);

Route::get('/course-jobs/{courseId}', [JobController::class, 'getCourseJobs']);
