<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListsTranslation extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'content',
        'pdf_title',
        'pdf',
        'pdf_title_2',
        'pdf_2'
    ];
}
