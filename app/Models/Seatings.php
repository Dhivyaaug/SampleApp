<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seatings extends Model
{
    use HasFactory;

    protected $table = "seating_records";

    public $timestamps = false;

    protected $primaryKey = 's_no';
}