<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\webinar;
use App\Models\category;
use App\Models\classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebinarController extends Controller
{
   

      public function index()
      {
          $webinar = webinar::paginate(10);
          return view('admin.webinar.view', compact('webinar'));
      }
  
      
      public function add()
      {
          return view('admin.webinar.add');
      }

  
      public function store(Request $request)
      {
            if ($request->hasFile('foto')) {
              $path= $request->file('foto')->store('webinarfoto');
          } else {
              $path= ' ';
          }
  
          $judul =$request->judul;
          $date= $request->date;
          $pemateri= $request->pemateri;
          $record= $request->record;
          $desc= $request->desc;
          $linkWebinar = $request->linkWebinar;
          $timeStart = $request->timeStart;
          $timeEnd = $request->timeEnd;
  
          $data = new webinar();
          $data->title = $judul;
          $data->date = $date;
          $data->speaker = $pemateri;
          $data->link_record = $record;
          $data->link_webinar = $linkWebinar;
          $data->cover = $path;
          $data->desc = $desc;
          $data->time_start = $timeStart;
          $data->time_end = $timeEnd;
          $data->save();
          return redirect()->route('admin.webinar.view')->with('info', 'Add User Succsess');    
      }
  
  
      public function edit($id)
      {
          //dd('hbh');
          // $editData = webinar::find($id);
          // return view('admin.crud_webinar.webinar_edit', compact('editData'));
          $webinar = webinar::find($id);
          $data = [
              'id' => $id,
              'judul' => $webinar->title,
              'date' => $webinar->date,
              'pemateri' => $webinar->speaker,
              'record' => $webinar->link_record,
              'desc' => $webinar->desc,
              'foto' => $webinar->cover,
              'linkWebinar' => $webinar->link_webinar,
              'timeStart' => $webinar->time_start,
              'timeEnd' => $webinar->time_end,
          ];
          return View('admin.webinar.edit', $data);
      }
  
      
      public function update(Request $request) {
          $id= $request->id;
          $judul =$request->judul;
          $date= $request->date;
          $pemateri= $request->pemateri;
          $record= $request->record;
          $desc= $request->desc;
          $linkWebinar = $request->linkWebinar;
          $timeStart = $request->timeStart;
          $timeEnd = $request->timeEnd;
  
          $data = webinar::find($id);
          if ($request->hasFile('foto')) {
              $path= $request->file('foto')->store('webinarfoto');
              $data->cover=$path;
          } 
  
          $data->title = $judul;
          $data->date = $date;
          $data->speaker = $pemateri;
          $data->link_record = $record;
          $data->link_webinar =  $linkWebinar;
          $data->desc = $desc;
          $data->time_start = $timeStart;
          $data->time_end = $timeEnd;
          $data->save();
          return redirect()->route('admin.webinar.view')->with('info', 'Add User Succsess');
  
      }
  
      public function delete($id){
          $webinar = webinar::find($id);
          $webinar->delete();
          return redirect()->route('admin.webinar.view')->with('info', 'Delete User Succsess');
  
      }
  
      public function cancel(){
          return redirect()->route('admin.webinar.view');
  
      }
  
      public function detailAdmin($id){
          $webinar = webinar::find($id);
          // dd($webinar);
          return View('admin.webinar.detail', compact('webinar'));
      }

}
