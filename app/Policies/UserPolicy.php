<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determina se l'utente può visualizzare l'elenco dei ruoli.
     */
    public function viewRoles(User $user)
    {
        // Gli admin di SafeTech possono visualizzare i ruoli
        return $user->hasRole('SafeTech-admin');
    }

    /**
     * Determina se l'utente può modificare i ruoli degli utenti SafeTech.
     */
    public function manageSafeTechRoles(User $user)
    {
        // Solo gli admin di SafeTech possono modificare i ruoli dei dipendenti SafeTech
        return $user->hasRole('SafeTech-admin');
    }

    /**
     * Determina se l'utente può modificare i ruoli dei dipendenti delle aziende clienti.
     */
    public function manageCompanyRoles(User $user)
    {
        // Gli admin delle aziende clienti possono gestire solo i ruoli dei dipendenti della loro azienda
        return $user->hasRole('company-admin') && !$user->hasRole('SafeTech-admin');
    }
}

















