<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
protected $guarded =[] ;

public function book(){
    return $this->belongsTo(
       BookImage::class ,
       'id',
        'book_id'
    );
}
}