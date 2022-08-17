<?php

namespace App\Models;

use App\Models\Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Header extends Model
{
    use HasFactory;
    public $table = 'header';
    public $fillable =['title' , 'main_image' , 'description' ,'video_link'];


}
