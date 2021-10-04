<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpChange extends Model
{
    use HasFactory;
    protected $fillable = ['contents', 'inserted', 'deleted', 'unmodified', 'changed_ratio', 'diff'];
}
