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
        Schema::create('periphels', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->string('serial')->nullable();
            $table->string('type');

            $table->foreignId('user_id')->nullable()->index()->constrained()->nullOnDelete();
            $table->foreignId('provaider_id')->index()->constrained()->cascadeOnDelete();

            $table->boolean('current')->default(true);

            $table->dateTime('purchased_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periphels');
    }
};
