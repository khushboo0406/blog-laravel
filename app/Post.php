<?php

namespace App;
use Illuminate\Database\Eloquent\Crypt;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table ='posts';
    public $primarykey = "id";
    public $timestamps = true;

//     public function setNameAttribute($value)
// {
//    $this->attributes['title'] = Crypt::encryptString($value);

// }

}



?>

