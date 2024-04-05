<?php

namespace App\Http\Controllers\administrator;

use App\Models\course;
use App\Models\discount_code_course;
use Illuminate\Support\Facades\Auth;

class DiscountController
{

    public function discount_admin(){
        return view('admin.course.discound_teacher');
    }

    public function marketing_discount($id){
        if (Auth::user()->hasRole('marketer') xor Auth::user()->hasRole('manager')){
            return view('admin.course.buy_discount',compact('id'));
        }else{
            return  view('errors.403');
        }
    }

    public function discount_code_list(){
        if (Auth::user()->hasRole('manager') xor  Auth::user()->hasRole('marketer')){
            return view('admin.course.discount_list');
        }else{
            return  view('errors.403');
        }
    }

    public function discount_code_create(){
        if (Auth::user()->hasRole('manager') xor  Auth::user()->hasRole('marketer')){
            $course = course::all();
            return view('admin.course.discount_create',compact('course'));
        }else{
            return  view('errors.403');
        }
    }
    public function discount_code_edit($id){
        if (Auth::user()->hasRole('manager') xor  Auth::user()->hasRole('marketer')){
            $discount = discount_code_course::where('id',$id)->first();
            $course = course::all();
            return view('admin.course.discount_edit',compact('discount','course'));
        }else{
            return  view('errors.403');
        }
    }

}
