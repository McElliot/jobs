<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('phone');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('qualification');
            $table->string('gender');
            $table->string('marital_status');
            $table->date('dob');
            $table->string('ordinary_board')->nullable();
            $table->string('ordinary_institute')->nullable();
            $table->integer('subjects')->nullable();
            $table->string('advanced_board')->nullable();
            $table->string('advanced_institute')->nullable();
            $table->integer('points')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('x')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('instagram')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
