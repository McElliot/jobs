<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: User::class)->constrained()->cascadeOnDelete();
            $table->string('contact_person')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('about')->nullable();
            $table->string('registration_certificate')->nullable();
            $table->string('profile')->nullable();
            $table->string('tax_clearance')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('x')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('instagram')->nullable();
            $table->text('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
