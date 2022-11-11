<?php

namespace App\Http\Controllers;
use App\Models\Notifkasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifkasi::where('user_id',auth()->user()->id)->get();
        return view('pages.notifikasi.index',compact('notifikasi'));
    }

    public function read($id)
    {
        $notifikasi = Notifkasi::find($id);
        if($notifikasi){
            Notifkasi::where('id',$id)->update([
                'is_read' => true
            ]);
            return redirect()->route('notifikasi.index')->with(['message'=>'Succes']);
        }

        return abort(404);
    }

    public function destroy($id)
    {
        $notifikasi = Notifkasi::find($id);
        if($notifikasi){
            $notifikasi->delete();
            return redirect()->route('notifikasi.index')->with(['message'=>'Succes']);
        }

        return abort(404);
    }

    public function readAll()
    {
        $notifikasi = Notifkasi::where('user_id',auth()->user()->id)->get();
        foreach($notifikasi as $item){
            Notifkasi::where('id',$item->id)->update([
                'is_read' => true
            ]);
        }

        return redirect()->route('notifikasi.index')->with(['message'=>'Succes']);
    }
}
