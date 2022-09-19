<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListType extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'modifier_id'
    ];

    public $translatedAttributes = ['title'];

    public function users()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function modifiers()
    {
        return $this->belongsTo(User::class);
    }
}
