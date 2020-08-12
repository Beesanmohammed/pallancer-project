<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];


    protected $table='book';

    public function category(){

        return $this->belongsTo(Category::class );
         
            
        
    

}
public function images(){
return $this->hasMany(
   BookImage::class ,
    'book_id',
    'id'
);

}
public function user(){
    return $this->belongsTo(
       User::class ,
        'user_id',
        'id'
    );
}
}
