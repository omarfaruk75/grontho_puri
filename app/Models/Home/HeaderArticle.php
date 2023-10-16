<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class HeaderArticle extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
