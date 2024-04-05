<?php

namespace app\Providers;

use Illuminate\Http\Client\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success',function ($state ,$message){
            return  response()->json([
                'status'=>$state,
                'message'=>$message,
            ]);
        });

        Response::macro('errors',function ($status, $errors){

            return  response()->json([
                'status'=>$status,
                'message'=>'خطای اعتبارسنجی',
                'errors'=>$errors
            ],404);
        });

        Response::macro('display',function ($data){
            return  response()->json([
                'data'=>$data
            ]);

        });

        Response::macro('LoginCode',function ($token,$user){

            return  response()->json([
                'status'=>'200',
                'message'=>'با موفقیت وارد شدید',
                'access_token'=>$token,
                'user' => $user
            ]);

        });

        Response::macro('AnyResponse',function ($state,$message,$role){

            return response()->json([
                'status'=>$state,
                'message'=>$message,
                'role'=>$role
            ]);

        });

        Response::macro('awayToFront',function ($code="ok",$message=""){
            $url = '/callback-page';
            return redirect()->away(env('FRONT_URL').$url.'?c='.$code);
        });
    }
}
