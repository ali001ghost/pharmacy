<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factory extends Model
{
    use HasFactory;

    public function factory()
    {
        return $this->hasMany(product::class);
    }

}
