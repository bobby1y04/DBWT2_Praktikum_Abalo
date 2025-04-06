<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AbUser;
use Illuminate\Support\Facades\DB;

class AbUserMassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Korrektur der Sequenz (id ist SERIAL Primary Key, also unter anderem auch unique)
        DB::select("SELECT setval('ab_user_id_seq', (SELECT MAX(id) FROM ab_user))");
        // Erzeugt 10000 User-Datensätze
        AbUser::factory()->count(10000)->create();

    }
}
