<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Why_Use_Awen extends Model
{
    use HasFactory;
    public $table ='why_use_awen';
    public $fillable =['id' , 'description','img_icon','serv_title','serv_desc' , 'created_at','updated_at'];
}
