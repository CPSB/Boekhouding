<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

/**
 * Class RoleTableSeeder
 */
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();               // Clear the table with old roles.
        Role::create(['name' => 'boekhouding']);    // Insert the user roles related to application.
    }
}
