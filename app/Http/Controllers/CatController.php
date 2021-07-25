<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(Category $category){
        return view('layouts.body.pro.pro',compact('category'));
    }
}
