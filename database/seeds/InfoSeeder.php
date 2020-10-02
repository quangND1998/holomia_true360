<?php

use Illuminate\Database\Seeder;
use App\Models\InfoProject;
class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infoproject = InfoProject::create([
            'project_id' => 1,
            'logo' => 'aaaaaaaaaaaaaa',
            'address'=>'Đà Nẵng',
            'thumbnail' => '1chuoidgdan',
            'link_register' => '1 chuoi gi do',
            'link_film' => '1 chuoi gi do '
        ]);
    }
}
