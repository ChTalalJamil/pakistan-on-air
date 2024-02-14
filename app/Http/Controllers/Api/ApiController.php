<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getCategoryBySlug($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
                'data' => null
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Category information retrieved successfully',
            'data' => $category
        ]);
    }

    public function getCategories()
    {
        $categories = Category::lazy();
        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ]);
    }

    public function getVideos()
    {
        $videos = Video::with('categories:id')->lazy();
        return response()->json([
            'success' => true,
            'message' => 'Videos retrieved successfully',
            'data' => $videos
        ]);
    }

    public function getVideoBySlug($slug)
    {
        $videos = Video::where('slug', $slug)->first();
        if (!$videos) {
            return response()->json([
                'success' => false,
                'message' => 'videos not found',
                'data' => null
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'videos information retrieved successfully',
            'data' => $videos
        ]);
    }

    public function getVideoByCategorySlug($slug)
    {
        // $category = Category::where('slug', $slug)->first();

        // $video_ids = DB::table('category_video')->where('category_id', $category->id)->select('video_id')->get();

        // $videos = [];
        // foreach ($video_ids as $video) {

        //     $videos += Video::where('id', $video->video_id)->get();
        // }

        // return $videos;
        $category = Category::where('slug', $slug)->with('videos')->first();

        if (!$category) {
            // Handle the case where the category is not found
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Return the videos associated with the category
        return response()->json($category->videos);
    }
}
