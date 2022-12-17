<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        User::create($request->all());
        return redirect(route('admin.user.index'))->with(['message' => 'Tambah data pengguna Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $check = User::where('id_user',$id)->first();
        if($check){
            return view('pages.admin.pengguna.edit',compact('check'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, $id)
    {
        if($request->password == null){
            $check = User::where('id_user',$id)->first();
            User::where('id_user',$check->id)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => $check->password,
                'username' => $request->username,
                'no_hp' => $request->no_hp,
            ]);
            return redirect(route('admin.user.index'))->with(['message' => 'Update data pengguna Success']);
        }

        $this->validate($request,[
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:8|confirmed',
            'username' => 'required|string|unique:users,username,'.$id,
            'no_hp' => 'required|string|min:10',
        ]);

        User::where('id_user',$id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'no_hp' => $request->no_hp,
        ]);
        return redirect(route('admin.user.index'))->with(['message' => 'Update data pengguna Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = User::where('id_user',$id)->first();
        if($check){
            User::where('id_user',$id)->delete();
            return redirect(route('admin.user.index'))->with(['message' => 'Delete data pengguna Success']);
        }
        return abort(404);
    }
}
