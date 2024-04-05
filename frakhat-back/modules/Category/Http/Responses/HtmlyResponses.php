<?php

namespace Modules\Category\Http\Responses;

use Illuminate\Http\Response;

class HtmlyResponses
{
    public static function getDataResponse($view, $data)
    {
        return view($view, compact("data"));
    }

    public static function failed()
    {
        return redirect()->back()->with('error', 'عملیات انجام نشد لطفا مجدد تلاش کنید):');
    }
    public static function failedWithMassage($massage)
    {
        return redirect()->back()->with('error', $massage);
    }

    public static function success()
    {
        return redirect()->back()->with('success', 'action success');
    }
}
