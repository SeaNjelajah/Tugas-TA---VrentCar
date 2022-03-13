<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    public function Dashboard () {
        return view('AdminPage.Dashboard.main');
    }

}
