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
        $videos = Video::with('categories')->get();
        $videos->each(function ($video) {
            $video->categories->transform(function ($category) {
                unset($category->description, $category->meta_title, $category->meta_description, $category->priority, $category->status, $category->created_at, $category->updated_at, $category->pivot);
                return $category;
            });
        });

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
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return response()->json([
                'data' => null,
                'message' => 'Category slug did not matched',
                'success' => false
            ], 404);
        }

        $videos = Video::whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })->with('categories')->get();

        $videos->each(function ($video) {
            $video->categories->transform(function ($category) {
                unset($category->description, $category->meta_title, $category->meta_description, $category->priority, $category->status, $category->created_at, $category->updated_at, $category->pivot);
                return $category;
            });
        });

        return response()->json([
            'data' => ['videos' => $videos],
            'message' => 'Videos retrieved successfully against this category slug',
            'success' => true
        ], 200);
    }
}
