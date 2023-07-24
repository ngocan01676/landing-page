<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class SeedDataPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
              // jobs
        Permission::findOrCreate('jobs_view');
        Permission::findOrCreate('jobs_create');
        Permission::findOrCreate('jobs_update');
        Permission::findOrCreate('jobs_delete');
        Permission::findOrCreate('jobs_manage_others');

        // jobs
        Permission::findOrCreate('projects_view');
        Permission::findOrCreate('projects_create');
        Permission::findOrCreate('projects_update');
        Permission::findOrCreate('projects_delete');
        Permission::findOrCreate('projects_manage_others');
    }
}
