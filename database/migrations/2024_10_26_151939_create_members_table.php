<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('name');
            $table->string('phone')->unique();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('regency_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('village_id')->constrained();
            $table->string('timekey')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
