<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Helper Functions
     */
    public function postsPath(){
        return route('user.city.posts',$this->id);
    }
}
