<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->getOutput()->progressStart(10);
        for ($i = 0; $i < 10; $i++) {
            //sleep(1);
            //sleep(0.4); //doesn't work, it works with 1 sec
            usleep(120000); //0,12sec

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();


        $this->call(RolesAndPermissionsSeeder::class);
        //$this->call(BicycleSeeder::class);

        $this->call(BicycleToRentSeeder::class);
        $this->call(BicycleToSellSeeder::class);
        $this->call(BicycleToServiceSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(RentSeeder::class);
        $this->call(ServiceSeeder::class);


        //$this->call(BicycleUserSeeder::class);
        $this->call(ServiceSeeder::class);


        // foreach (\Illuminate\Support\Facades\Storage::files('app/database/seeds') as $filename) {
        //     $files = \Illuminate\Support\Facades\Storage::get($filename);
        //     var_dump($files);
        // }

        //$dir = '/app/database/seeds';
        //$files = Storage::allfiles('app/database/seeds');
        //$files = File::allFiles($dir);

        //dd($files);

        // $bar = $this->command->getOutput()->createProgressBar(count($files));

        // $bar->start();

        // foreach ($files as $file) {
        //     $this->DB::seed($file);

        //     //$bar->advance();
        //     $this->command->getOutput()->progressAdvance();
        // }

        // $bar->finish();
        // $this->command->getOutput()->progressFinish();
    }
}
