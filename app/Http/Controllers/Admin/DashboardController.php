<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KulinerPlace;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
        {
        $kuliner_count = KulinerPlace::count();
        $users_count = User::count();
        return view('pages.admin.dashboard',[
            'kuliner_count'=>$kuliner_count,
            'users_count'=>$users_count
        ]);
        }
}
