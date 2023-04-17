<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'status',
        'slug',
        'parent_id',
        'order',
        'create_tag',
        'level',
        'description',
        'image'
    ];

    public function getTableColumns()
    {
        $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM ' . $this->getTable()));

        return $table_info_columns;
    }

    public function tag()
    {
        return $this->hasOne('Modules\Tag\Entities\Tag');
    }
}
