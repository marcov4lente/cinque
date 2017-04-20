<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $prefix = config('database.connections.mysql.prefix');

        Schema::create($prefix.'contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['signed', 'unsigned']);
            $table->bigInteger('client_id');
            $table->bigInteger('quote_id');
            $table->bigInteger('invoice_id');
            $table->date('issued_date');
            $table->string('name');
            $table->longText('description');
            $table->string('attachment');
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'contracts_audit', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('record_id');
            $table->enum('status', ['signed', 'unsigned']);
            $table->bigInteger('client_id');
            $table->bigInteger('quote_id');
            $table->bigInteger('invoice_id');
            $table->date('issued_date');
            $table->string('name');
            $table->longText('description');
            $table->string('attachment');
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::Unprepared('
            CREATE DEFINER =`root`@`localhost` TRIGGER
            contracts_ua
            AFTER UPDATE
            ON contracts
            FOR EACH ROW
            BEGIN
                INSERT INTO
                contracts_audit
                SET
                record_id = NEW.id,
                status = NEW.status,
                client_id = NEW.client_id,
                quote_id = NEW.quote_id,
                invoice_id = NEW.invoice_id,
                issued_date = NEW.issued_date,
                due_date = NEW.due_date,
                name = NEW.name,
                description = NEW.description,
                attachment = NEW.attachment,
                created_at = NEW.created_at,
                updated_at = NEW.updated_at,
                created_by = NEW.created_by,
                updated_by = NEW.updated_by;
            END
            ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = config('database.connections.mysql.prefix');
        Schema::dropIfExists($prefix.'contracts');
        Schema::dropIfExists($prefix.'contracts_audit');
    }
}
