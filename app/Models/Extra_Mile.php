<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra_Mile extends Model
{
    use HasFactory;
    public $table ='extra_mile';
    public $fillable =['id' , 'title','img','created_at','updated_at'];
}
