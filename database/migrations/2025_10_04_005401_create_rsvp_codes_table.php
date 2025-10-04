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
        Schema::create('rsvp_codes', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique(); // invite/OTP code
        $table->boolean('used')->default(false); // mark if already used
        $table->string('guest_name')->nullable();
        $table->string('phone')->nullable();
        $table->enum('attending', ['yes', 'no'])->nullable();
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
        Schema::dropIfExists('rsvp_codes');
    }
};
