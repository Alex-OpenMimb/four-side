<?php

namespace Database\Seeders;

use App\Models\Seguridad\Usuario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        foreach (Usuario::$DATA as $index => $data  ){
            Usuario::create([
                'usuarioNombre' => $data['usuarioNombre'],
                'usuarioAlias' => Str::slug($data['usuarioNombre'],'-'),
                'usuarioPassword' =>  Hash::make($data['usuarioPassword']),
                'usuarioEmail' => $data['usuarioEmail'],
            ]);
        }

    }
}
