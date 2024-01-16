<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->decimal('discount');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('total');
            $table->enum('type', array('0', '1'));  // بيع = 0  ..... شراء = 1
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
        Schema::dropIfExists('invoices');
    }
};
