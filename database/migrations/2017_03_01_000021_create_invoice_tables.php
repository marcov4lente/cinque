<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $prefix = config('database.connections.mysql.prefix');

        Schema::create($prefix.'invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['outstanding', 'settled']);
            $table->bigInteger('client_id');
            $table->bigInteger('quote_id');
            $table->date('issued_date');
            $table->date('due_date');
            $table->decimal('sub_total', 15,4);
            $table->decimal('total', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'invoices_audit', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('record_id');
            $table->enum('status', ['outstanding', 'settled']);
            $table->bigInteger('client_id');
            $table->bigInteger('quote_id');
            $table->date('issued_date');
            $table->date('due_date');
            $table->decimal('sub_total', 15,4);
            $table->decimal('total', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::Unprepared('
            CREATE DEFINER =`root`@`localhost` TRIGGER
            invoices_ua
            AFTER UPDATE
            ON invoices
            FOR EACH ROW
            BEGIN
                INSERT INTO
                invoices_audit
                SET
                record_id = NEW.id,
                status = NEW.status,
                client_id = NEW.client_id,
                quote_id = NEW.quote_id,
                issued_date = NEW.issued_date,
                due_date = NEW.due_date,
                sub_total = NEW.sub_total,
                total = NEW.total,
                created_at = NEW.created_at,
                updated_at = NEW.updated_at,
                created_by = NEW.created_by,
                updated_by = NEW.updated_by;
            END
            ');

        Schema::create($prefix.'invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('invoice_id');
            $table->enum('type', ['addition', 'subtraction']);
            $table->bigInteger('sequence');
            $table->longText('description');
            $table->bigInteger('quantity');
            $table->decimal('rate', 15,4);
            $table->decimal('price', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'invoice_items_audit', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('record_id');
            $table->bigInteger('invoice_id');
            $table->enum('type', ['addition', 'subtraction']);
            $table->bigInteger('sequence');
            $table->longText('description');
            $table->bigInteger('quantity');
            $table->decimal('rate', 15,4);
            $table->decimal('price', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::Unprepared('
            CREATE DEFINER =`root`@`localhost` TRIGGER
            quote_items_ua
            AFTER UPDATE
            ON quote_items
            FOR EACH ROW
            BEGIN
                INSERT INTO
                quote_items_audit
                SET
                record_id = NEW.id,
                invoice_id = NEW.quote_id,
                type = NEW.type,
                sequence = NEW.sequence,
                description = NEW.description,
                quantity = NEW.quantity,
                rate = NEW.rate,
                price = NEW.price,
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
        Schema::dropIfExists($prefix.'invoices');
        Schema::dropIfExists($prefix.'invoices_audit');
        Schema::dropIfExists($prefix.'invoice_items');
        Schema::dropIfExists($prefix.'invoice_items_audit');
    }
}
