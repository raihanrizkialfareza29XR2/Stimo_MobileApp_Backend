<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorStrategis extends Model
{
    use HasFactory;

    protected $table = 'indikator_strategis';

    protected $guarded = ['id'];
}
