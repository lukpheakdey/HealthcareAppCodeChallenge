<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient1 = Patient::create([
            'name' => 'Arlie Watsica V',
            'age' => 65,
            'phone' => '(883) 939-9096',
            'start_date' => '2019-03-15',
            'deadline' => '2019-03-15',
        ]);
    }
}
