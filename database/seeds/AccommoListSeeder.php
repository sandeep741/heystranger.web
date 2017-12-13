<?php

use Illuminate\Database\Seeder;

class AccommoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Accommodation\AccommodationList::class,10)->create();
    }
}
