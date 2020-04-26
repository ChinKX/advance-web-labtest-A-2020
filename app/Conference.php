<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'conf_id',
        'name'
    ];

    public function authors() {
        return $this->belongsToMany(Author::class);
    }

    public function papers() {
        // need to specify the foreign key because it didn't follow the naming convention
        return $this->hasMany(Paper::class, 'conf_id');
    }
}
