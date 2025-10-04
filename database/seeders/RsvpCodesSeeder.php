<?php

namespace Database\Seeders;

use App\Models\RsvpCode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RsvpCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $prefix = 'GloTerry';
        $total = 160;

        for ($i = 1; $i <= $total; $i++) {
            $code = $prefix . str_pad($i, 3, '0', STR_PAD_LEFT);

            RsvpCode::create([
                'code' => $code,
                'used' => false,
            ]);
        }
    }
}
