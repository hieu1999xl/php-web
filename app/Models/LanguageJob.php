<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageJob extends Model
{
    use HasFactory;
    protected $table = 'languages_job';
    protected $fillable = [
        'language',
        'job_id',
        'job_name',
        'job_description',
        'job_requirement',
        'job_benefits',
        'job_location',
        'job_time',
        'job_title',
        'job_salary',
        'slug',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

}
