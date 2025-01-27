<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemainTimnas extends Model
{
    use HasFactory;

    protected $table = 'pemain_timnas';

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi');
    }

    protected $keyType = 'string';

    protected $fillable = ['nama', 'klub', 'id_posisi'];
    public $timestamps = false;
}
