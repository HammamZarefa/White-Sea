<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignid('shipment');
            $table->string('item_id');
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('destination');
            $table->string('packages_content');
            $table->integer('packages_number');
            $table->integer('received_packages')->nullable();
            $table->integer('lost_packages')->nullable();
            $table->integer('delivered_packages')->nullable();
            $table->integer('remaining_packages')->nullable();
            $table->string('delivered_by')->nullable();
            $table->date('delivered_date')->nullable();
            $table->date('sending_date');
            $table->text('sending_notes')->nullable();
            $table->decimal('cost');
            $table->decimal('down_payment');
            $table->decimal('second_installment');
            $table->decimal('remaining_amount');
            $table->text('notes')->nullable();
            $table->foreignId('status_id')->constrained('shipment_statuses');
            $table->string('delivery_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_items');
    }
}
