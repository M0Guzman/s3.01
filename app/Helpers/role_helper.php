<?php

use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
/**
 * Vérifie si l'utilisateur authentifié possède un rôle spécifique.
 *
 * @param string $role Le nom du rôle à vérifier.
 * @return bool
 */

function hasRole(string $role): bool
{
    $user = Auth::user(); // Récupère l'utilisateur connecté
    if (!$user) {
        return false; // Si pas d'utilisateur, retourne false
    }

    // Exemple : Supposons que $user->role contienne le rôle (ou une relation avec des rôles)
    return UserRole::find($user->user_role_id)->name == $role; // Adaptation possible selon ton modèle
}
