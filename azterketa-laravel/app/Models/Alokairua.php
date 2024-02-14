<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alokairua extends Model
{
    use HasFactory;

    public function yateak(){
        return $this->hasMany(Yatea::class);
    }
}
