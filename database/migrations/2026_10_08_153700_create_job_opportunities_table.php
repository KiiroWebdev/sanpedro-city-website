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
        Schema::create('job_opportunities', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('office')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('salary_grade')->nullable();

            $table->text('qualification')->nullable();
            $table->longText('duties')->nullable();
            $table->longText('application_requirements')->nullable();
            $table->longText('how_to_apply')->nullable();

            $table->date('posting_date')->nullable();
            $table->date('application_deadline')->nullable();

            $table->enum('status', ['draft', 'published', 'closed'])
                ->default('draft');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_opportunities');
    }
};