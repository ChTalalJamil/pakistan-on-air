<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getCategoryByName($name)
    {
        $category = VideoCategory::where('name', $name)->first();
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
        $categories = VideoCategory::lazy();
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

    public function getVideoByName($name)
    {
        $videos = Video::where('name', $name)->first();
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
