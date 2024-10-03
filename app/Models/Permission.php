<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    // Personalizzazioni aggiuntive possono essere inserite qui, senza ridefinire metodi già presenti
    // nel pacchetto Spatie (come roles() o users()) per evitare conflitti.

    /**
     * Esempio di personalizzazione per verificare se un permesso è assegnato a un utente specifico.
     * Questo metodo non deve entrare in conflitto con quelli già definiti nel pacchetto.
     */
    public function hasPermissionForUser($user)
    {
        return $user->hasPermissionTo($this->name); // Usa i metodi di Spatie per verificare i permessi
    }

    /**
     * Esempio di personalizzazione per verificare se un permesso è assegnato a una determinata azienda
     * (nel caso in cui lo userai in futuro per gestire i permessi a livello aziendale).
     */
    public function hasPermissionForCompany($company)
    {
        // Questa logica va implementata solo se colleghi permessi alle aziende.
        // Altrimenti puoi rimuoverla o tenerla per futuri sviluppi.
    }
}
