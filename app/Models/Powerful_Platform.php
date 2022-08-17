<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powerful_Platform extends Model
{
    use HasFactory;
    public $table ='powerful_platform';
    public $fillable =['id','img','description','created_at','updated_at'];
}
