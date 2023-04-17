<?php


namespace Database\Seeders;
use App\Models\Island;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class IslandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $islands = [
            ['name'=> 'K. Male'],
            ['name'=> 'K. Hulhumale'],
            ['name'=> 'LH. Hinnavaru'],
            ['name'=> 'GN. Fuvahmulah'],
            ['name'=> 'S. Hithadhoo'],
        ];

        foreach($islands as $island){
            Island::create($island);
        }
    }
}
