<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use \App\Models\category;
use App\Models\classroom;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function show()
    {
        $category = category::all();
        return view('frontend.class', compact('category'));
    }

    public function list( $cat)
    {
        $class = classroom::where('category_id', $cat)->paginate(9);
        $category = category::find($cat);
        return view('frontend.classvidio' ,compact('class','category'));
    }
    public function detail($id)
    {
        $class= classroom::find($id);
        $select = classroom::paginate(3);
        // $category = category::where('id', '==', $class->category_id)->get(['title_category']);
        return view('frontend.classdetail' ,compact('class','select'));
    }
}
