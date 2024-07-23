<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        "title",
        "content",
        "author",
        "show",
        "schedule_on"
    ];
}
