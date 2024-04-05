<?php

namespace Modules\UserDetail\Http\Responses;

use Illuminate\Http\Response;

class HtmlyResponses
{
    public static function successWithData($type_update)
    {
        session(['type_update' => $type_update]);
        return redirect()->back()->with('success', 'action success');
    }
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
