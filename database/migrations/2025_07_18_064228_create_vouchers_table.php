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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_code')->unique();
            $table->string('voucher_name');
            $table->string('voucher_quantity')->nullable();
            $table->decimal('voucher_discount', 10, 2);
            $table->dateTime('voucher_start_date');
            $table->dateTime('voucher_end_date');
            $table->integer('voucher_status')->default(0); // 0: inactive, 1: active
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
