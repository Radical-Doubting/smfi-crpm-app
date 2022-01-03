<?php

namespace Database\Seeders;

use Database\Seeders\Batch\BatchSeeder;
use Database\Seeders\Crop\CropBuyerSeeder;
use Database\Seeders\Crop\CropSeeder;
use Database\Seeders\Crop\SeedStageSeeder;
use Database\Seeders\Farmer\FarmerProfileSeeder;
use Database\Seeders\Farmer\FarmerReportSeeder;
use Database\Seeders\Farmland\FarmlandSeeder;
use Database\Seeders\Farmland\WateringSystemSeeder;
use Database\Seeders\Farmland\FarmlandStatusSeeder;
use Database\Seeders\Farmland\FarmlandTypeSeeder;
use Database\Seeders\Site\MunicitySeeder;
use Database\Seeders\Site\ProvinceSeeder;
use Database\Seeders\Site\RegionSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Metadata
        $this->call(RegionSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(MunicitySeeder::class);

        $this->call(FarmlandTypeSeeder::class);
        $this->call(FarmlandStatusSeeder::class);
        $this->call(CropBuyerSeeder::class);
        $this->call(WateringSystemSeeder::class);
        $this->call(SeedStageSeeder::class);

        // Data (in order)
        $this->call(CropSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FarmerProfileSeeder::class);
        $this->call(BatchSeeder::class);
        $this->call(FarmlandSeeder::class);
        $this->call(FarmerReportSeeder::class);
    }
}
