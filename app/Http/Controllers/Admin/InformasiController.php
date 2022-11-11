<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InformasiRequest;
use App\Models\Informasi;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.informasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformasiRequest $request)
    {
        Informasi::create($request->all());
        return redirect()->route('admin.informasi.index')->with(['success'=>'Tambah data success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $check = Informasi::find($id);
        if($check){
            return view('pages.admin.informasi.edit', ['check' => $check]);
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
    public function update(InformasiRequest $request, $id)
    {
        $check = Informasi::find($id);
        if($check){
            Informasi::where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'step'=>$request->step,
                'tgl'=>$request->tgl,
            ]);
            return redirect()->route('admin.informasi.index')->with(['success'=>'Update Success']);
        }

        return redirect()->route('admin.informasi.index')->with(['success'=>'Oopss error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Informasi::find($id);
        if($check){
            $check->delete();
            return redirect()->route('admin.informasi.index')->with(['success'=>'Delete Success']);
        }

        return redirect()->route('admin.informasi.index')->with(['success'=>'Oopss error']);
    }
}
