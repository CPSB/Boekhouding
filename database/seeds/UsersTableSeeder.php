<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Permission, Role};

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no.
        if ($this->command->confirm('Do you wish to refresh migrations before seeding, is will clear old data!')) {
            // Call the pgp artisan refresh command. (migrate:refresh)
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, started from blank database.');
        }

        // Confirm roles that are needed.
        if ($this->command->confirm('Create roles for users, default is Admin, User and Boekhouding. [y|N]', true)) {
            // Ask roles from input.
            $inputRoles = $this->command->ask('Enter Roles in comma seperated format.', 'admin, user, boekhouding');
            $rolesArray = explode(',', $inputRoles);

            foreach ($rolesArray as $role) { // Add roles
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if ($role->name == 'admin' || $role->name == 'boekhouding') { // Assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info("{$role->name} granted all permissions");
                } else { // For others by default only read access.
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }

                $this->createUser($role);
            }
        }
    }

    /**
     * Create a user with the given role
     *
     * @param  string $role The database output from the given role.
     * @return void
     */
    private function createUser($role)
    {
        $user = factory(User::class)->create();     // Create dummy user.
        $user->assignRole($role->name);             // Assign role

        if ($role->name == 'admin' || $role->name == 'boekhouding') {
            $this->command->info("Here is your {$role->name} details to login:");
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');

        }
    }
}
