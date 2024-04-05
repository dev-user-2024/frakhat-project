<?php

use Illuminate\Support\Facades\Route;

Route::post('/user-auth/request-token', 'TokenController@issueToken');

Route::post('/user-auth/check-token', 'TokenController@checkToken');

Route::post('/user-auth/update-user', 'RegisterController@updateUser');

Route::post('/user-auth/user-login', 'LoginController@userLogin');

Route::post('/user-auth/logout', 'LoginController@logout');


Route::post('/user-auth/forgot-password', 'ForgotPasswordController@forgotPassword');

Route::post('/user-auth/reset-password', 'ForgotPasswordController@resetPassword');
