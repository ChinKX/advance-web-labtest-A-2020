<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name'
    ];

    public function conferences() {
        return $this->belongsToMany(Conference::class);
    }

    public function papers() {
        return $this->hasMany(Paper::class);
    }
}
