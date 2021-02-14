<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $users = User::all()->load('projects', 'tasks');

        return view('home.index', compact('users'));
    }
}
