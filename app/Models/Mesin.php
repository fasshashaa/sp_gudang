<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    protected $table = 'tb_mesin';

    // Nama primary key di model harus sama persis dengan di database
    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';
public $timestamps = false;
    // Semua nama kolom di fillable juga harus sama persis
    protected $fillable = [
        'kode',
        'nama_mesin',
        'no_motor',
        'type_motor',
        'kw_motor',
        'rpm_motor',
        'bearing_depan',
        'bearing_belakang',
        'seal_depan',
        'seal_belakang',
        'catatan'
    ];
}