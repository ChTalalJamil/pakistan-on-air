<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VideoCategory::all();
        // $accepted = Lead::where('status', '=', 1)->get();
        // $rejected = Lead::where('status', '=', 0)->get();

        return view('admin.components.video.category.categories-list', compact(
            'categories'
            // , 'accepted_lead_count', 'rejected_lead_count','total_leads'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.components.video.category.categories-form');
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
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'priority' => 'nullable|integer',
            'status' => 'nullable|in:active,inactive',
        ]);

        $validatedData['uuid'] = Str::uuid();
        // $validatedData['uuid'] = $uuid->uuid;
        // dd($validatedData);
        // Create a new VideoCategory instance
        $videoCategory = VideoCategory::create($validatedData);


        return Redirect::back()->with('success', 'category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCategory $videoCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $videoCategory = VideoCategory::where('uuid', $uuid)->first();
        // dd($videoCategory);
        return view('admin.components.video.category.categories-form', compact('videoCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);
        $videoCategory = VideoCategory::findOrFail($request->id);
        $videoCategory->update($validatedData);

        return Redirect::back()->with('success', 'category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoCategory  $videoCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $video = VideoCategory::findOrFail($id);
        $video->delete();

        return Redirect::back()->with('success', 'category deleted successfully!');
    }


    public function getFilterCategories(Request $request)
    {

        $data = VideoCategory::whereBetween('created_at', [$request->start, $request->end]);

        $categories = $data->get();


        return view('admin.components.video.category.categories-list', compact(
            'categories'
            // , 'accepted_lead_count', 'rejected_lead_count', 'total_leads'
        ));
    }
}
