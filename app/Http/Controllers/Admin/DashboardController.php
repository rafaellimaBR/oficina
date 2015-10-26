<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 24/10/15
 * Time: 17:11
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
        return view('admin.dashboard');
    }
}