<?php

namespace Modules\CategoryUser\Http\Responses;

use Illuminate\Http\Response;

class HtmlyResponses
{
    public static function getDataResponse($view, $data)
    {
        return view($view, compact("data"));
    }

    public static function failed()
    {
        return redirect()->back()->with('error', 'action does not success');
    }

    public static function success()
    {
        return redirect()->back()->with('success', 'action success');
    }
}