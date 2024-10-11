<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determina se l'utente può visualizzare la lista di tutti gli utenti.
     * Solo SafeTech-admin può farlo.
     */
    public function viewAny(User $user)
    {
        // Solo SafeTech-admin può visualizzare tutti gli utenti
        return $user->hasRole('SafeTech-admin');
    }

    /**
     * Determina se l'utente può visualizzare un singolo utente.
     * SafeTech-admin può vedere chiunque.
     * Company-admin può vedere gli utenti della sua azienda.
     * Employee può vedere solo il proprio profilo.
     */
    public function view(User $user, User $model)
    {
        // Se l'utente è un employee, può vedere solo se stesso
        if ($user->hasRole('employee') && $user->id === $model->id) {
            return true;
        }

        // Se l'utente è un company-admin, può vedere solo gli utenti della sua azienda
        if ($user->hasRole('company-admin') && $user->company_id === $model->company_id) {
            return true;
        }

        // SafeTech-admin può vedere tutti
        return $user->hasRole('SafeTech-admin');
    }

    /**
     * Determina se l'utente può aggiornare il profilo di un altro utente.
     */
    public function update(User $user, User $model)
    {
        // Gli employee non possono aggiornare nessun altro utente
        if ($user->hasRole('employee')) {
            return false;
        }

        // Gli admin aziendali possono aggiornare solo gli utenti della propria azienda
        if ($user->hasRole('company-admin') && $user->company_id === $model->company_id) {
            return true;
        }

        // SafeTech-admin può aggiornare chiunque
        return $user->hasRole('SafeTech-admin');
    }

    /**
     * Determina se l'utente può cancellare un altro utente.
     */
    public function delete(User $user, User $model)
    {
        // Solo SafeTech-admin può cancellare utenti
        return $user->hasRole('SafeTech-admin');
    }
}
