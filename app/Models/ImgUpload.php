<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\languages;

class ImgUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'link_button',
        'image',
        'oder',
        'type',
        'status'
    ];

    public function getTableColumns()
    {
        $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM ' . $this->getTable()));

        return $table_info_columns;
    }

    public function language()
    {
        return $this->hasMany(languages::class, 'prefer_id', 'id');
    }

    public function dataLocale()
    {
        return $this->hasOne(languages::class, 'prefer_id', 'id')
            ->where('type', 2)
            ->where('language', app()->getLocale());
    }
}
