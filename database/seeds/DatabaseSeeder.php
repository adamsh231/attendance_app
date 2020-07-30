<?php

use Illuminate\Database\Seeder;
use App\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert([
            'name' => 'Adam Syarif Hidayatullah',
            'email' => 'coba@gmail.com',
            'password' => bcrypt('dayung231'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(Student::class, 50)->create();

    }
}
