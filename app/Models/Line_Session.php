<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line_Session extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['question_id','session_id','Rep'];
}
