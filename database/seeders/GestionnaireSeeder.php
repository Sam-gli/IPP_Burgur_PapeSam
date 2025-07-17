<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class GestionnaireSeeder extends Seeder
{
    public function run()
    {
        // Vérifier s'il existe déjà un gestionnaire, sinon en créer un
        if (User::where('role', 'gestionnaire')->count() == 0) {
            User::create([
                'name' => 'PapeSam',
                'email' => 'papesam@ipp.com',
                'password' => 'passer17#', // Assure-toi de changer ce mot de passe
                'role' => 'gestionnaire',
            ]);
        }
    }
}
