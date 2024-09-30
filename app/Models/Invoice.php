<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Invoice extends Model
{


use HasFactory;

    // Relazione con azienda (una fattura appartiene a una azienda)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
