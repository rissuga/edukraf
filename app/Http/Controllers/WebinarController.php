<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\webinar;
use App\Models\category;
use App\Models\classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebinarController extends Controller
{
    //
    public function show()
    {
        $webinar = webinar::paginate(9);
        return view('frontend.webinar', compact('webinar'));
    }


    public function show_soon()
    {   
        $now = Carbon::now()->timestamp;
        $webinar = webinar::whereDate('date','>','2022-12-13')->paginate(9);
        return view('frontend.webinar', compact('webinar'));
    }
    
    public function show_done()
    {   
        $now = Carbon::now()->timestamp;
        $webinar = webinar::whereDate('date','<','2022-12-13')->paginate(9);
        return view('frontend.webinar', compact('webinar'));
    }
    
    public function detail($id)
    {
        $webinar = webinar::find($id);
        $select = webinar::paginate(3);
        return view('frontend.webinardetail', compact('webinar', 'select'));
    }

}
