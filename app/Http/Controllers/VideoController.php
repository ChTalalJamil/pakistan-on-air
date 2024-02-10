<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
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

        // dd($videos);

        return view('admin.components.video.video.video-list', compact(
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

        $categories =  VideoCategory::select('id', 'name')->get();
        return view('admin.components.video.video.video-form', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'priority' => 'nullable|integer',
            'category_id' => 'required|exists:video_categories,id',
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

        return  $this->index();
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
    public function edit(Video $video)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}