<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('subtotal',10,2);
            $table->double('shipping',10,2);
            $table->double('coupon_code')->nullable;
            $table->string('discount')->nullable;
            $table->double('grand_total',10,2);
            $table->timestamps();

            //User Table

            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('email');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
             $table->text('address');
            $table->string('appartment')->nullable;
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->text('notes');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
