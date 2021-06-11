<?php

namespace Database\Seeders;

use App\Models\Firms;
use Illuminate\Database\Seeder;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ------------------------ PERMISSION INSERT START -------------------------
         * Insert first firm
         * --------------------------------------------------------------------------
         */
        Firms::create([
            'FirmName'      =>  'Swastik Brass Industries',
            'FirmAddress'   =>  'Plot No K1-283/1 GIDC Phase 1, Shanker Tekri.',
            'FirmCity'      =>  'Jamnagar',
            'FirmPinCode'   =>  '361001',
            'FirmState'     =>  'Gujarat',
            'FirmCountry'   =>  'INDIA',
            'FirmPhoneNo'   =>  '0288-2562468',
            'FirmGSTN'      =>  '24APSPK0902N1ZO'
        ]);
    }
}
