<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        return response()->json($classes);
    }
 
    public function store(Request $request)
    {
        $class = ClassModel::create($request->only('name'));
        $class->courses()->attach($request->input('course_ids'));
        return response()->json($class);
    }
}

