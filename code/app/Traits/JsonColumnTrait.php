<?php 

namespace App\Traits;

trait JsonColumnTrait{
    /**
     * Magic Method to get Publisher json column values as 
     * Model Attributes
     */
    public function __get($key)
    {
        /**
         * Decode Json to Array 
         */
        $contact =  json_decode( isset( $this->attributes['contact']) ? $this->attributes['contact'] : '[]' ,true);

        /**
         * Check if $key exist in json decoded array
         */
        if ( array_key_exists($key, $contact )){
            return $contact[$key];
        }

        /**
         * If value or property is not set 
         * or found in json Column than call
         * default parent _get method to get actual property
         */
        return parent::__get($key);
    }
}