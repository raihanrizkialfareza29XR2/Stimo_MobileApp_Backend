<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaResmi extends Model
{
    use HasFactory;

    protected $table = 'berita_resmi';

    protected $guarded = ['id'];
}
