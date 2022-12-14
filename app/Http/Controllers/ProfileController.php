<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::where('id',auth()->user()->id_user)->first();
        return view('pages.profile.index',compact('profile'));
    }

    public function upload(Request $request)
    {
        $foto =  $request->file('file');
       $image =  $this->convertTobase64($foto);
       User::where('id',auth()->user()->id_user)->update([
        'foto'=>$image
       ]);

       return 'oke';
    }

    public function convertTobase64($image)
    {
        $encode = file_get_contents($image->path());
        $mimeType = $image->getMimeType();
        $base64 = base64_encode($encode);
        $dataURL = 'data:'.$mimeType.';base64,'.$base64;
        return $dataURL;
    }
}
