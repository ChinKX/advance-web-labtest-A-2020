<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'paper_id',
        'name',
        'author_id',
        'conf_id'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function conference() {
        return $this->belongsTo(Conference::class, 'conf_id');
    }
}
