<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class How_It_Works extends Model
{
    use HasFactory;
    public $table='how_it_works';
    public $fillable =['id','img','title','description','created_at','updated_at'];
}
