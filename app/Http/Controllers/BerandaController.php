<?php

namespace App\Http\Controllers;
use App\Models\webinar;
use App\Models\category;
use App\Models\classroom;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    
    public function fiturshow()
    {
        $webinar = webinar::orderBy('date', 'desc')->limit(5)->get();
        $category = category::all();
        $class = classroom::orderBy('created_at', 'asc')->limit(5)->get();
        return view('frontend.index', compact('webinar', 'category', 'class'));
    }

}
