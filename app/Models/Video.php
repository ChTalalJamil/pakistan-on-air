<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
    'uuid', 'name', 'link', 'description', 'status', 'priority'
    ];
    public function categories()
    {
        return $this->belongsToMany(VideoCategory::class);
 
    }

}
