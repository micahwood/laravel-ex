<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    public function showDashboard()
    {
        return View::make('dashboard');
    }

}
