<?php

namespace Database\Seeders;

use App\Models\ServiceHelp;
use Illuminate\Database\Seeder;

class ServiceHelpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ServiceHelp::factory(10)->create();
    }
}
