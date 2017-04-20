<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $prefix = config('database.connections.mysql.prefix');

        Schema::create($prefix.'quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['accepted', 'rejected', 'expired']);
            $table->bigInteger('client_id');
            $table->bigInteger('invoice_id');
            $table->date('issued_date');
            $table->date('expiry_date');
            $table->decimal('sub_total', 15,4);
            $table->decimal('total', 15,4);
            $table->timestamps();
            $table->string('deleted_at');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by');
        });

        Schema::create($prefix.'quotes_audit', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('record_id');
            $table->enum('status', ['accepted', 'rejected', 'expired']);
            $table->bigInteger('client_id');
            $table->bigInteger('invoice_id');
            $table->date('issued_date');
            $table->date('expiry_date');
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
            quotes_ua
            AFTER UPDATE
            ON quotes
            FOR EACH ROW
            BEGIN
                INSERT INTO
                quotes_audit
                SET
                record_id = NEW.id,
                status = NEW.status,
                client_id = NEW.client_id,
                invoice_id = NEW.invoice_id,
                issued_date = NEW.issued_date,
                expiry_date = NEW.expiry_date,
                sub_total = NEW.sub_total,
                total = NEW.total,
                created_at = NEW.created_at,
                updated_at = NEW.updated_at,
                created_by = NEW.created_by,
                updated_by = NEW.updated_by;
            END
            ');

        Schema::create($prefix.'quote_items', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('quote_id');
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

        Schema::create($prefix.'quote_items_audit', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('record_id');
            $table->bigInteger('quote_id');
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
                quote_id = NEW.quote_id,
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
        Schema::dropIfExists($prefix.'quotes');
        Schema::dropIfExists($prefix.'quotes_audit');
        Schema::dropIfExists($prefix.'quote_items');
        Schema::dropIfExists($prefix.'quote_items_audit');
    }
}
