<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HugsIncRegistration extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'hugs_inc_registrations';
    public $guarded = ['id'];
}
