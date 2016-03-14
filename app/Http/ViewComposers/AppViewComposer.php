<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

/**
 * Class AppViewComposer
 *
 * @package App\Http\ViewComposers
 */
class AppViewComposer
{

    /**
     * Compose.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('user', \Auth::user());
    }
}
