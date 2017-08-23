<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable=[
        'task','slug','description','category','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
