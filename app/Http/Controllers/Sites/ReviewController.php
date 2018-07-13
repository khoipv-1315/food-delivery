<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.review');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $review = Review::find($request->id);

        return view('layouts.review', compact('review'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $review = new Review();
            $review->user_id = $user_id;
            $review->food_id = $request->food_id;
            $review->content = $request->content;
            $review->rate = $request->rating;
            $review->save();
            session()->flash('success', trans('master.successToReview'));

            return back();
        } catch (Exception $e) {
            session()->flash('error', trans('master.failToReview'));

            return back();
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
        //
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
        try {
            $review = Review::find($id);
            $review->rate = $request->rating;
            $review->content = $request->content;
            $review->save();
            session()->flash('success', trans('master.successToReview'));

            return back();
        } catch (Exception $e) {
            session()->flash('error', trans('master.failToReview'));

            return back();
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
        //
    }
}
