<?php

namespace App\Models;

use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[UsePolicy(PostPolicy::class)]
class Post extends Model
{ 
    use HasFactory;
    protected $fillable=[
           "name",
           "description",
           "date",
           "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
