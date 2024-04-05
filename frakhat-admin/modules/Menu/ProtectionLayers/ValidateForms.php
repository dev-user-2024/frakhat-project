<?php

namespace Modules\Menu\ProtectionLayers;

use Illuminate\Validation\Rule;
use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['menu.store'])
            ->validate(['category_id'=>'required|unique:menus']);
        HeyMan::onCheckPoint(['menu.update'])->validate([
            'category_id' => [
                'required',
                Rule::unique('menus')->ignore(request('id')),
            ],
        ]);

        HeyMan::onCheckPoint(['menu.tab.store'])
            ->validate([
                'category_id'=>'required',
                'position' => [
                    'required',
                    Rule::unique('tabs')->where(function ($query) {
                        return $query->where('position', request('position'))
                            ->where('section_id', request('section_id'));
                    }),
                ],
            ]);
        HeyMan::onCheckPoint(['menu.tab.update'])
            ->validate([
                'category_id'=>'required',
                'position' => [
                    'required',
                    Rule::unique('tabs')->where(function ($query) {
                        return $query->where('position', request('position'))
                            ->where('section_id', request('section_id'));
                    })->ignore(request('id')),
                ],
            ]);
    }
}
