<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asetrusakM extends Model
{
    use HasFactory;
    protected $table = 'asetrusak';
    protected $primaryKey = 'idasetrusak';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function aset()
    {
        return $this->belongsTo(asetM::class, 'idaset','idaset');
    }
}
