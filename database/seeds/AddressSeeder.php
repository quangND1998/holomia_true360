<?php

use Illuminate\Database\Seeder;
use App\Models\AddressProject;
class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $address = AddressProject::create([
            'address' => 'Da Nang',
            'project_id'=> 1
       ]);
    }
}
