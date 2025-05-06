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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('position')->nullable();
            $table->string('employer')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('industry')->nullable();
            $table->string('level')->nullable();
            $table->string('reporting_to')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('responsibilities')->nullable();
            $table->string('accolades')->nullable();
            $table->string('failures')->nullable();
            $table->string('exit_reason')->nullable();
            $table->string('referee')->nullable();
            $table->string('capacity')->nullable();
            $table->string('period_known')->nullable();
            $table->string('ref_email')->nullable();
            $table->string('ref_tel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
