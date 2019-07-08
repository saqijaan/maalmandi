<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $casts = [
        'images' => 'Array'
    ];

    protected $fillable=[
        'title','category_id','city_id','description','user_id','active','main_image','price'
    ];

    protected $appends = [
        'main_image_path',
        'images_with_path'
    ];
    /**
     * Accessors
     */
    public function getMainImagePathAttribute(){
        return route('post.image',$this->main_image);
    }

    public function getImagesWithPathAttribute(){
        $imagesPaths = array();
        foreach ($this->images as $image) {
            array_push($imagesPaths,route('post.image',$image));
        }
        return $imagesPaths;
    }
    
    /**
     * Relationships
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Helper Functions
     */
    public function postPath(){
        return route('user.post.show',$this->id);
    }

    
}
