<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePosition extends Model
{
    use HasFactory;
    protected $table = "pages_positions";
    protected $guarded = [];
}
