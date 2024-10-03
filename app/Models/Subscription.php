<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Relazione con azienda (un abbonamento appartiene a una azienda)
    public function company()
    {


return $this->belongsTo(Company::class);
    }

    // Relazione con il tipo di abbonamento (un abbonamento ha un tipo)
    public function type()
    {
        return $this->belongsTo(SubscriptionType::class);
    }

    public static function uriKey()
    {
        return 'subscription';
    }


}
