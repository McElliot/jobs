<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('duties')->nullable();
            $table->text('qualifications')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('location')->nullable();
            $table->date('deadline');
            $table->string('job_sector')->nullable();
            $table->string('job_type')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
            $table->string('application_type')->nullable();
            $table->decimal('min_salary')->nullable();
            $table->decimal('max_salary')->nullable();
            $table->string('salary_type')->nullable();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->string('gender')->nullable()->default('any');
            $table->string('contact')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->default('pending');
            $table->text('logo')->nullable();
            $table->text('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('openings');
    }
};
