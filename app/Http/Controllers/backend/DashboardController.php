<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userSession = [
            "id" => session('id'),
            "name" => session('name'),
            "level" => session('level'),
        ];
        return view('admin.index.index', compact('userSession'));
    }
};