<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Like;

class Dogs extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_link']; 

    public $timestamps = true; 

    public function like()
    {
        return $this->hasOne(Like::class, 'likeable_id')->where('user_id', auth()->user()->id);
    }

    public function likes()
    {
        return $this->hasOne(Like::class, 'likeable_id');
    }    
}
