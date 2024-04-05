<?php

namespace Modules\Post\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['post.store'])
            ->validate([
                'languages.*.title'=>'required',
                'languages.*.summary'=>'required',
                'languages.*.content' => 'required',
                'image' => 'required|max:2048',
                'imageables.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'videoable' => 'mimetypes:video/*',
                'category_id' => 'required|array|min:1',
                'category_id.*' => 'required|integer',
                'tag_id' => 'required|array|min:1',
                'tag_id.*' => 'required|integer',
                ]);
        HeyMan::onCheckPoint(['post.update'])
            ->validate([
                'languages.*.title'=>'required',
                'languages.*.summary'=>'required',
                'languages.*.content' => 'required',
                'category_id.*' => 'required',
                'image' => 'required|max:2048',
                'tag_id.*' => 'required',
                'imageables.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
//                'videoable' => 'max:10240'
            ]);
    }
}
