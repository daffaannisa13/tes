<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("admin.home", [
            "total_user" => User::query()->count(),
            "total_paket" => Paket::query()->count(),
            "total_customer" => Customer::query()->count()
        ]);
    }
   
    
}
