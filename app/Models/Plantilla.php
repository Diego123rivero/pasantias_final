<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory;
    protected $table="plantilla";
    protected $primarykey="id";
    protected $fillable=['actividad','fecha','imagen'];
    protected $hidden=['id'];
}
