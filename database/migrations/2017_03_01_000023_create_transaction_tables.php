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

        Schema::create($prefix.'transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['credit', 'debit']);
            $table->bigInteger('client_id');
            $table->bigInteger('invoice_id');
            $table->date('date');
            $table->string('description');
            $table->decimal('amount', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('record_id');
            $table->enum('type', ['credit', 'debit']);
            $table->bigInteger('client_id');
            $table->bigInteger('invoice_id');
            $table->date('date');
            $table->string('description');
            $table->decimal('amount', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::Unprepared('
            CREATE DEFINER =`root`@`localhost` TRIGGER
            transactions_ua
            AFTER UPDATE
            ON transactions
            FOR EACH ROW
            BEGIN
                INSERT INTO
                transactions_audit
                SET
                record_id = NEW.id,
                type = NEW.type,
                client_id = NEW.client_id,
                invoice_id = NEW.invoice_id,
                date = NEW.date,
                description = NEW.description,
                amount = NEW.amount,
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
        Schema::dropIfExists($prefix.'transactions');
        Schema::dropIfExists($prefix.'transactions_audit');
    }
}
