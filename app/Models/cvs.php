<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class cvs extends Model
{
    use HasFactory;

    protected $fillable = [
        'username_candidate',
        'email_candidate',
        'phone_candidate',
        // 'description_candidate',
        'position',
        'times_start_job',
        'file_cv',
        'status',
        'update_by'
    ];

    public function getTableColumns()
    {
        $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM ' . $this->getTable()));

        return $table_info_columns;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'update_by', 'id');
    }
}
