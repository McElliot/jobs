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
        Schema::create('current_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: User::class)->constrained()->cascadeOnDelete();
            $table->string('institute');
            $table->string('certification');
            $table->date('completion_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_studies');
    }
};
