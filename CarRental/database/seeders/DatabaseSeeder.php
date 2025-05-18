<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
class DatabaseSeeder extends Seeder{
    public function run(): void{
        $this->call(AdminSeeder::class);
    }
}
