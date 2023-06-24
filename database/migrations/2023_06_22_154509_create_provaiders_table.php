<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provaiders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->index()->constrained()->cascadeOnDelete();
            $table->string('name');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provaiders');
    }
};
