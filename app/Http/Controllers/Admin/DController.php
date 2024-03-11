<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class DController extends Controller
{
     public function indexx()
    {
        return view("sales.home", [
            "total_customer" => Customer::query()->count()
        ]);
    }
}
