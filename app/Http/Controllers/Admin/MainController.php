<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Nationality;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $genders=Gender::all();
        $nationalities=Nationality::all();
        return view('admin.index', compact('genders', 'nationalities'));
    }
}
