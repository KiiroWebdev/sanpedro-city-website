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
        Schema::create('bidding_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bidding_id')
                ->constrained('biddings')
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('file_path');

            $table->string('file_name');

            $table->string('file_size')->nullable();

            $table->string('document_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidding_documents');
    }
};