<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function table()
    {
        return view('admins.news.table');
    }

    public function create()
    {
        return view('admins.news.create');
    }

    public function details()
    {
        return view('admins.news.details');
    }
}
