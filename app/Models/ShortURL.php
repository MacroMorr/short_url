<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shortURL extends Model
{
    protected $table = 'short_urls';
    public $timestamps = false;
}
