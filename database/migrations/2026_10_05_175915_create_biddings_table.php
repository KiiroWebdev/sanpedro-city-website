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
    Schema::create('biddings', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->string('slug')->unique();

        $table->string('reference_no')->nullable();

        $table->enum('type', [
            'Invitation to Bid',
            'Request for Quotation',
            'Notice of Award',
            'Other',
        ])->default('Invitation to Bid');

        $table->text('description')->nullable();

        $table->decimal('abc', 15, 2)->nullable();

        $table->string('procurement_mode')->nullable();

        $table->date('posting_date')->nullable();
        $table->dateTime('submission_deadline')->nullable();
        $table->dateTime('opening_date')->nullable();

        $table->string('venue')->nullable();

        $table->string('contact_person')->nullable();
        $table->string('contact_email')->nullable();
        $table->string('contact_phone')->nullable();

        $table->enum('status', [
            'draft',
            'published',
            'closed',
        ])->default('draft');

        $table->timestamp('published_at')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biddings');
    }
};
