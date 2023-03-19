<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'Super Admin','guard_name' => 'admin']);
        $roleAdmin = Role::create(['name' => 'Admin','guard_name' => 'admin']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // Admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'company',
                'permissions' => [
                    // Company Permissions
                    'company.create',
                    'company.view',
                    'company.edit',
                    'company.delete',
                    'company.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // Role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'seekerEducation',
                'permissions' => [
                    // Seeker Education Permissions
                    'seekerEducation.create',
                    'seekerEducation.view',
                    'seekerEducation.edit',
                    'seekerEducation.delete',
                ]
            ],
            [
                'group_name' => 'seekerExperience',
                'permissions' => [
                    // Seeker Experience Permissions
                    'seekerExperience.create',
                    'seekerExperience.view',
                    'seekerExperience.edit',
                    'seekerExperience.delete',
                ]
            ],
            [
                'group_name' => 'seekerExpert',
                'permissions' => [
                    // Seeker Expert Permissions
                    'seekerExpert.create',
                    'seekerExpert.view',
                    'seekerExpert.edit',
                    'seekerExpert.delete',
                ]
            ],
            [
                'group_name' => 'seekerReference',
                'permissions' => [
                    // Seeker Reference Permissions
                    'seekerReference.create',
                    'seekerReference.view',
                    'seekerReference.edit',
                    'seekerReference.delete',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    // User Permissions
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.approve',
                ]
            ],

        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup,
                    'guard_name' => 'admin'
                ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }

        //to register super admin at model has roles table
        //here role_id =superadmin model_id=customer_id
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\Admin',
            'model_id' => 1

        ]);
    }
}
