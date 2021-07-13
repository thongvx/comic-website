<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function storeAvatar(Request $request){
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $avatarName = uniqid().$filename;
//            todo: Resize file cỡ tầm 30x30 thôi rồi lưu lại
            $file->storeAs('public/images/avatars/', $avatarName);
            return $avatarName;
        }
        return '';
    }
}
