<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Events\PostCreated;

class languages extends Model
{
    use HasFactory;
    protected $fillable = [
        'prefer_id',
        'title',
        'descrition',
        'body',
        'language',
        'type',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_og_url',
        'position_quantity'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];

    public function posts()
    {
        return $this->belongsTo(PostCreated::class, 'prefer_id', 'id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'prefer_id', 'id');
    }

    public function imguploads()
    {
        return $this->belongsTo(ImgUpload::class, 'prefer_id', 'id');
    }
}
