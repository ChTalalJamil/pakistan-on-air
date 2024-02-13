<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;

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
}
