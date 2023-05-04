<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Menubar;

class MenuBarComposer
{
    public function compose(View $view)
    {
        $menu = Menubar::all();
        $view->with('menu', $menu);
    }
}
