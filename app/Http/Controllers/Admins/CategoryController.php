<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()){
            $categories = Category::paginate(config('setup.user_paginate'));
            
            return view('admin.category.index', compact('categories'));
        } else {
            if ($request->ajax()){
                $categories = Category::paginate(config('setup.user_paginate'));   

                return view('admin.category.index', compact('categories'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category;
        $input = $request->all();

        if ($categories->create($input)) {

            return redirect()->route('admin.category.index');
        } else {
            
            return redirect()->route('admin.category.create')->with('message', trans('messages.create_failed'));
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
        if ($categories = Category::find($id)) {

            return view('admin.category.edit', compact('categories'));
        } else {
            session()->flash('fail', trans('admin_category.not id'));

            return redirect('admin/category');
        }
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
        $categories = new Category;
        if ($categories = $categories->find($id)) {
            $input = $request->all();
            if ($categories->update($input)) {

                return redirect()->route('admin.category.index');
            } else {

                return redirect()->route('admin.category.edit')->with('message', trans('messages.create_failed'));
            }
        } else {
            session()->flash('fail', trans('admin_user.not id'));
            return redirect('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($categories = Category::find($id)) {
            $categories->delete($id);
            session()->flash('success', trans('admin_category.delete_success'));

            return redirect('admin/category');
        } else {
            session()->flash('fail', trans('admin_category.not id'));

            return redirect('admin/category');
        }
    }
}
