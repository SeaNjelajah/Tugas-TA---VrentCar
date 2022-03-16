<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiturMobilController extends Controller
{
    public function index () {
        return view('AdminPage.FiturMobil.main');
    }
}
