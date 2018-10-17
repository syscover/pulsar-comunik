<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class ComunikPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 300, 'name' => 'Comunik Package', 'root' => 'comunik', 'sort' => 300, 'active' => true]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ComunikPackageSeeder"
 */