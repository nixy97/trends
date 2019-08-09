<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'body',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
