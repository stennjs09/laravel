<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function following()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function getImage()
    {   
        $imagePath = $this->image ?? 'avatars/default.png';
        
        return "/storage/" . $imagePath;
    }
}
