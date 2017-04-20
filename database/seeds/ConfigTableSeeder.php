<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $prefix = config('database.connections.mysql.prefix');

        DB::table($prefix.'config')->insert([
            'section' => 'Organisation',
            'key' => 'organisation_name',
            'name' => 'Organisation name',
            'string_value' => 'Test Company Incorporated',
        ])
        ->insert([
            'section' => 'Organisation',
            'key' => 'organisation_address',
            'name' => 'Address',
            'text_value' => '123, Road Street, Townsville',
        ])
        ->insert([
            'section' => 'Organisation',
            'key' => 'organisation_email',
            'name' => 'Email',
            'string_value' => 'TestCompanyIncorporated@example.com',
        ])
        ->insert([
            'section' => 'Organisation',
            'key' => 'organisation_telephone',
            'name' => 'Telephone',
            'string_value' => '1234 5678 9101',
        ])
        ->insert([
            'section' => 'Regional',
            'key' => 'regional_language',
            'name' => 'Language',
            'string_value' => 'en-gb',
        ])
        ->insert([
            'section' => 'Regional',
            'key' => 'regional_currency',
            'name' => 'Currency',
            'string_value' => '€',
        ])
        ->insert([
            'section' => 'Regional',
            'key' => 'regional_timezone',
            'name' => 'Timezone',
            'string_value' => '0',
        ])
        ->insert([
            'section' => 'Regional',
            'key' => 'regional_timeformat',
            'name' => 'Datetime Format',
            'string_value' => 'Y-m-d H:i:s',
        ])
        ->insert([
            'section' => 'Regional',
            'key' => 'regional_timeformat',
            'name' => 'Date Format',
            'string_value' => 'Y-m-d',
        ])
        ->insert([
            'section' => 'Regional',
            'key' => 'regional_timeformat',
            'name' => 'Time Format',
            'string_value' => 'H:i',
        ])
        ->insert([
            'section' => 'Email',
            'key' => 'email_smtp_username',
            'name' => 'SMTP Username',
            'string_value' => 'username@example.com',
        ])
        ->insert([
            'section' => 'Email',
            'key' => 'email_smtp_password',
            'name' => 'SMTP Password',
            'string_value' => 'P@$$w0rd',
        ])
        ->insert([
            'section' => 'Email',
            'key' => 'email_smtp_server',
            'name' => 'SMTP Server',
            'string_value' => 'smtp.example.com',
        ])
        ->insert([
            'section' => 'Email',
            'key' => 'email_smtp_server',
            'name' => 'SMTP Port',
            'string_value' => '995',
        ])
        ->insert([
            'section' => 'Email',
            'key' => 'email_smtp_security',
            'name' => 'SMTP Security',
            'string_value' => 'TLS',
        ]);

    }
}
