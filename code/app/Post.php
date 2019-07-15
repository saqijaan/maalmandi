<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\JsonColumnTrait;

class Post extends Model
{
    use JsonColumnTrait;
    
    protected $casts = [
        'images' => 'Array',
        'contact' => 'Object'
    ];

    protected $fillable=[
        'title',
        'category_id',
        'city_id',
        'description',
        'user_id',
        'active',
        'main_image',
        'price',
        'contact'
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
