<?php

namespace App\Http\Controllers\Admin;
use \App\Models\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
     /******Admin******/
     public function index()
     {
         $category = category::paginate(20);
         return view('admin.category.view', compact('category'));
     }
 
     public function add()
     {
         // $MyUser = ViewUser::all();
         return view('admin.category.add');
     }
 
     public function store(Request $request)
     {
         $title =$request->title;
         $desc= $request->desc;
       
         $data = new category();
         $data->title_category = $title;
         $data->desc_category = $desc;
         $data->save();
        //  toastr()->success('Berhasil Tambah Kategori');
         return redirect()->route('admin.category.view')->with('success', 'Tambah kategori berhasil');   
     }
 
     public function edit($id)
     {
      
         $category = category::find($id);
         $data = [
             'id' =>$id,
             'title' =>$category->title_category,
             'desc' =>$category->desc_category,
         ];
         return View('admin.category.edit', $data);
     }
 
     public function update(Request $request) 
     {
         $id= $request->id;
         $title =$request->title;
         $desc= $request->desc;
 
         $data = category::find($id);
         $data->title_category = $title;
         $data->desc_category = $desc;
         $data->save();
         return redirect()->route('admin.category.view')->with('success', 'Update Kategori berhasil');   
     }
 
     public function delete($id){
         $category = category::find($id);
         $category->delete();
         return redirect()->route('admin.category.view');
 
     }
     
     public function cancel(){
         return redirect()->route('admin.category.view');
 
     }
 
     
    //  /******Frontend*******/
 
    //  public function show()
    //  {
    //      $category = category::all();
    //      return view('frontend.class', compact('category'));
    //  }
 
     
    //  public function fiturBeranda()
    //  {
    //      $category = category::all();
    //      dd($category);
    //      return view('frontend.index', compact('category'));
    //  }
 
    //  public function categoryshow()
    //  {
    //      $category =category::where('id','<',6)->get();
    //      return view('frontend.index', compact('category'));
    //  }
     
    //  public function tampil()
    //  {
        
    //      $category = category::all();
    //      return view('frontend.class', compact('category'));
    //  }
}
