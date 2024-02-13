<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with('categories:id')->get();

        return view('admin.components.module.video.video-list', compact(
            'videos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories =  Category::select('id', 'name')->get();
        return view('admin.components.module.video.video-form', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'priority' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new video instance
        $video = Video::create([
            'name' => $validatedData['name'],
            'link' => $validatedData['link'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'priority' => $validatedData['priority'],
            'uuid' => Str::uuid(),
        ]);

        // Attach categories to the video
        $video->categories()->attach($validatedData['category_id']);

        return Redirect::back()->with('success', 'video created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $video = Video::where('uuid', $uuid)->first();
        return view('admin.components.module.video.video-form', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'priority' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $video = Video::findOrFail($request->id);
        $video->update($validatedData);

        return Redirect::back()->with('success', 'video created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return Redirect::back()->with('success', 'video deleted successfully!');
    }


    public function getFilterVideo(Request $request)
    {

        $data = Video::whereBetween('created_at', [$request->start, $request->end]);

        $videos = $data->get();

        return view('admin.components.module.category.categories-list', compact(
            'videos'
        ));
    }
}
