<?php

use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $prefix = config('database.connections.mysql.prefix');

        DB::table($prefix.'access_permissions')->insert([
            'id' => '1',
            'key' => 'read_clients'
            'name' => 'View clients'
        ])
        ->insert([
            'id' => '2',
            'key' => 'write_clients'
            'name' => 'Create and update clients'
        ])
        ->insert([
            'id' => '3',
            'key' => 'read_quotes'
            'name' => 'View quotes'
        ])
        ->insert([
            'id' => '4',
            'key' => 'write_quotes'
            'name' => 'Create and update quotes'
        ]
        ->insert([
            'id' => '5',
            'key' => 'read_invoices'
            'name' => 'View invoices'
        ])
        ->insert([
            'id' => '6',
            'key' => 'write_invoices'
            'name' => 'Create and update invoices'
        ])
        ->insert([
            'id' => '7',
            'key' => 'read_transactions'
            'name' => 'View transactions'
        ])
        ->insert([
            'id' => '8',
            'key' => 'write_transactions'
            'name' => 'Create and update transactions'
        ])
        ->insert([
            'id' => '9',
            'key' => 'read_contracts'
            'name' => 'View contracts'
        ])
        ->insert([
            'id' => '10',
            'key' => 'write_contracts'
            'name' => 'Create and update contracts'
        ])
        ->insert([
            'id' => '11',
            'key' => 'read_users'
            'name' => 'View users'
        ])
        ->insert([
            'id' => '12',
            'key' => 'write_users'
            'name' => 'Create and update users'
        ])
        ->insert([
            'id' => '13',
            'key' => 'read_config'
            'name' => 'View system configuration'
        ])
        ->insert([
            'id' => '14',
            'key' => 'write_config'
            'name' => 'Update system configuration'
        ]);

        DB::table($prefix.'access_roles')->insert([
            'id' => '1',
            'name' => 'Administrator'
        ]);

        DB::table($prefix.'access_role_permissions')->insert([,
            'role_id' => '1'
            'permission_id' => '1'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '2'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '3'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '4'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '5'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '6'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '7'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '8'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '9'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '10'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '11'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '12'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '13'
        ])
        ->insert([,
            'role_id' => '1'
            'permission_id' => '14'
        ]);

    }
}
