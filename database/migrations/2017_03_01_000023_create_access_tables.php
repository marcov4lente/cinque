<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $prefix = config('database.connections.mysql.prefix');

        Schema::create($prefix.'access_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'access_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'access_role_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('role_id');
            $table->bigInteger('permission_id');
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = config('database.connections.mysql.prefix');
        Schema::dropIfExists($prefix.'access_permissions');
        Schema::dropIfExists($prefix.'access_roles');
        Schema::dropIfExists($prefix.'access_role_permissions');
    }
}
