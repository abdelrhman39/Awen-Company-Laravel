<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    public $table ='services';
    public $fillable =['id' , 'description','icon','serv_title','serv_desc' , 'created_at','updated_at'];
}
