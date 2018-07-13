<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserForm;
use App\Helpers\helper;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(config('setup.user_paginate'));
        if ($request->ajax()) {
            return view('admin.user.paginate', compact('users'))->render();
        }
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all();
        return view('admin.user.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserForm $request)
    {
        try {
            $users = new User;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = bcrypt($request->password);
            $users->phone = $request->phone;
            $users->address = $request->address;
            $users->role = $request->role;
            if ($request->hasFile('avatar')) {
                $avatarName = helper::importFile($request->file('avatar'), config('setup.user_avatar'));
                $users->avatar = $avatarName;
            }   
            $users->save();
            session()->flash('success', trans('admin_user.add_success'));

            return redirect('admin/user');
        } catch (\Exception $e) {
            session()->flash('fail', trans('admin_user.add_fail'));
            return redirect('admin/user/create');
        }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);        
        return view('admin.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = new User;
        if ($users = $users->find($id)) {
            $input = $request->all();
            if ($request->hasFile('avatar')) {
                $avatarName = helper::importFile($request->file('avatar'), config('setup.user_avatar'));
                $input['avatar'] = $avatarName;
            }
            if ($users->update($input)) {
                return redirect()->route('admin.user.index', [$id])->with('message', trans('messages.update_success'));     
            } else {
                return redirect()->route('admin.user.edit', [$id])->with('message', trans('messages.update_failed'));
            }
        } else {
            session()->flash('fail', trans('admin_user.not id'));
            return redirect('admin.user.index');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, request $request)
    {
        if ($users = User::find($id)) {
            $users->delete($id);
            session()->flash('success', trans('admin_user.delete_success'));

            return redirect('admin/user');
        } else {
            session()->flash('fail', trans('admin_user.not id'));
            return redirect('admin/user');
        }
        
    }

    public function profile()
    {
        $users = Auth::user();        
        return view('admin.user.profile', compact('users'));
    }

    public function updateProfile(Request $request, $id)
    {
        $users = new User;
        if ($users = $users->find($id)) {
            $input = $request->all();
            if ($request->hasFile('avatar')) {
                $avatarName = helper::importFile($request->file('avatar'), config('setup.user_avatar'));
                $input['avatar'] = $avatarName;
            }
            if ($users->update($input)) {
                return redirect()->route('admin.user.index', [$id])->with('message', trans('messages.update_success'));     
            } else {
                return redirect()->route('admin.user.profile', [$id])->with('message', trans('messages.update_failed'));
            }
        } else {
            session()->flash('fail', trans('admin_user.not id'));

            return redirect('admin.user.index');
        }        
    }

    public function search(Request $request)
    {   
        try {
            $name = $request->name;
            $users = User::where('name', 'like', '%'. $name .'%')
                ->orWhere('email', 'like', '%'. $name .'%')->get();
            $html = view('admin.user.search', compact('users'))->render();

            return response($html);
        } catch (Exception $e) {
            $response['error'] = true;
            
            return response()->json($response);
        }
    }
}
