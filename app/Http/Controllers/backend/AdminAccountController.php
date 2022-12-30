<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Models\adminAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminAccountController extends Controller
{
    public function home()
    {

        return 'selmat ';
    }
    //
    public function index()
    {
        $MyUser = User::paginate(5);
        return view('admin.adminAccount.view', compact('MyUser'));
    }

    public function add()
    {
        // $MyUser = ViewUser::all();
        return view('admin.adminAccount.add');
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'textName' => 'required',
        ]);
        
        // dd($request);
        $data = new User();
       
        $data->name = $request->textName;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $request->session()->flash('msg',  "Data dengan nama berhasil disimpan");
        return redirect()->route('admin.view')->with('info', 'Add User Succsess');
    }

    public function edit($id)
    {
        // dd('hbh');
        $editData = User::find($id);
        return view('admin.adminAccount.edit', compact('editData'));
    }

    public function update(Request $request, $id)
    {
       
        // $validateData = $request->validate([
        //     'textName' => 'required',
        //     'email' => ['required', Rule::unique('users')->ignore($this->user)]
        // ]);

        // dd($request);
        $data = User::find($id);
        $data->name = $request->textName;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('admin.view')->with('info', 'Update User Succsess');
    }

    public function delete($id)
    {
        // dd('hbh');
        $editData = User::find($id);
        $editData->delete();
        return redirect()->route('admin.view')->with('info', 'Delete User Succsess');
    }

    public function cancel(){
        return redirect()->route('admin.view');

    }
}
