<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_name',
        'job_intro',
        'job_description',
        'job_requirement',
        'job_benefits',
        'job_location',
        'job_time',
        'job_title',
        'job_salary',
        'job_left_time',
        'slug',
        'status',
        'position_quantity'
    ];

    public function getTableColumns()
    {
        $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM ' . $this->getTable()));

        return $table_info_columns;
    }

    public function language()
    {
        return $this->hasMany(LanguageJob::class, 'job_id', 'id');
    }

    public function dataLocale()
    {
        return $this->hasOne(LanguageJob::class, 'job_id', 'id')
            ->where('language', app()->getLocale());
    }
}
