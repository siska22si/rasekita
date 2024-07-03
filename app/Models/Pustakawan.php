<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pustakawan extends Model
{
    protected $primaryKey = 'id_pustakawan';
    protected $table = 'pustakawans';
    public $timestamps = false;
    protected $fillable = ['username', 'password'];
}
