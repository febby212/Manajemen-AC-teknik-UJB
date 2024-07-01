<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use CsHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id' => 'USR-' . CsHelper::data_id(),
            'name' => 'was',
            'username' => 'was1',
            'email' => 'was1@gma.com',
            'password' => Hash::make('123'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
            'created_by' => 'dev'
        ]);

        $this->call([
            CaseBaseSeeder::class,
            GejalaSeeder::class,
            SolusiSeeder::class
        ]);
    }
}
