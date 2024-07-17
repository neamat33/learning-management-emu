<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions_map = ['l' => 'list', 'c' => 'create', 'r' => 'show', 'u' => 'edit', 'd' => 'delete'];

       
        // Item
        $resourece_features['student'] = ['l', 'c', 'u', 'd'];
        $resourece_features['branch'] = ['l', 'c', 'u', 'd'];
        $resourece_features['class'] = ['l', 'c', 'u', 'd'];
        $resourece_features['section'] = ['l', 'c', 'u', 'd'];
        $resourece_features['batch'] = ['l', 'c', 'u', 'd'];
        $resourece_features['shift'] = ['l', 'c', 'u', 'd'];
        $resourece_features['subject'] = ['l', 'c', 'u', 'd'];
        $resourece_features['subject_assign'] = ['l', 'c', 'u', 'd'];
        $resourece_features['fees-collections'] = ['l', 'c', 'u', 'd'];
        $resourece_features['accounts'] = ['l', 'c', 'u', 'd'];
        $resourece_features['transactions'] = ['l', 'c', 'u', 'd'];
        $resourece_features['transaction_category'] = ['l', 'c', 'u', 'd'];
        $resourece_features['instructor'] = ['l', 'c', 'u', 'd'];
        $resourece_features['course'] = ['l', 'c', 'u', 'd'];
        $resourece_features['course-category'] = ['l', 'c', 'u', 'd'];


        $other_permissions['academic']='academic';
        $other_permissions['accounting']='accounting';
        
        // Setting
        $other_permissions['setting']='misc';
        $other_permissions['backup']='misc';
        // $other_permissions['roles']='roles';

        $resourece_features['role'] = ['l', 'c', 'u', 'd'];
        $resourece_features['user'] = ['l', 'c', 'u', 'd'];
        $other_permissions['permissions']='role';



        $other_permissions['profile']='profile';
        $other_permissions['change_password']='profile';

        // Dashboard
        $other_permissions['dashboard']='dashboard';


        foreach ($resourece_features as $key => $rf) {
            foreach ($rf as $feature) {
                $access = $permissions_map[$feature];
                Permission::create([
                    'name' => $access . "-" . $key,
                    'feature' => $key
                ]);
            }
        }


        foreach ($other_permissions as $permission => $value) {
            Permission::create([
                'name' => $permission,
                'feature' => $value
            ]);
        }

        $all_permissions = Permission::pluck('name');

        $admin = Role::where('name','admin')->first();
        $test_admin = Role::where('name','test_admin')->first();

        $admin->syncPermissions($all_permissions);
        $test_admin->syncPermissions($all_permissions);

        $operator = Role::where('name','operator')->first();

        $operator_permissions = [
            'profile',
            'change_password'
        ];

        $operator->syncPermissions($operator_permissions);


    }
}
