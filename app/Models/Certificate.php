<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['certificate_id','user_id','language_id','language_progress','time_passed','certificate_validate','date_validate'];
}
