<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];
    protected $perPage = 4 ;

    
    public function books(){

        return $this->hasMany(
            Book::class ,
            'category_id',
            'id'
            

        );

}
/*public function children(){
   
    return $this->hasMany(
        Category::class ,
        'book_id',
        'id'

    ); 
}
public function parent(){
   
    return $this->belongsTo(
        Category::class ,
        'book_id',
        'id'

    ); 
}
*/
}