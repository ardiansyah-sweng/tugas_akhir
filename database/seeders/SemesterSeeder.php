<?php

namespace Database\Seeders;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodeSemester = (new PeriodeSemester())->getSemester();
        foreach ($periodeSemester as $semester){
            Semester::create([
                'semester' => $semester['semester'],
                'start'    => $semester['start'],
                'end'      => $semester['end'] 
            ]);
        }
    }
}

class PeriodeSemester
{
    function getSemester()
    {
        return [
            ['semester' => 'Gasal 2020-2021', 'start' => '2020-09-20', 'end' => '2021-01-31'],
            ['semester' => 'Genap 2020-2021', 'start' => '2021-02-01', 'end' => '2021-08-30'],
            ['semester' => 'Gasal 2021-2022', 'start' => '2021-09-20', 'end' => '2022-01-31'],
            ['semester' => 'Genap 2021-2022', 'start' => '2022-02-01', 'end' => '2022-08-30']
        ];
    }
}
