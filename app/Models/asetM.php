<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asetM extends Model
{
    use HasFactory;
    protected $table = 'aset';
    protected $primaryKey = 'idaset';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function asetrusak()
    {
        return $this->hasOne(asetrusakM::class, 'idaset','idaset');
    }

}
