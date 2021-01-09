<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function cvs()
    {
        return $this->belongsToMany('App\Models\Cv');
    }
    /*public function setPostImageAttribute($value)
    {
       $this->attributes['post_image']=asset($value);
    }*/

    public function getPostImageAttribute($value)
    {
      if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
        return $value;
      }
        return asset('storage/' . $value);
    }

}
