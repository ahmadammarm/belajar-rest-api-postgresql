<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemainTimnas extends Model
{
    use HasFactory;

    protected $table = 'pemain_timnas';

    protected $keyType = 'string';

    protected $fillable = ['nama', 'nopung', 'klub'];
    public $timestamps = false;
}
