<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        return view('layouts.profile', compact('user'));
    }

    public function getProfile()
    {
        $user = Auth::user();

        return view('layouts.editprofile', compact('user'));
    }

    public function editProfile(EditProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension('avatar');
            $file->move(config('customer.link.avatar_folder'), $fileName);
            File::delete('../public' . $user->avatar);
            $user->avatar = $fileName;
        }
        $check = $user->save();
        if (!$check) {
            session()->flash('error', trans('master.failOrder'));

            return back();
        }

        return redirect()->route('showProfile');
    }
}
