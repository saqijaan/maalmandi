<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->hasMany(Post::class,'category_id');
    }

    /**
     * Helper Functions
     */
    public function postsPath(){
        return route('user.category.posts',$this->id);
    }

}
