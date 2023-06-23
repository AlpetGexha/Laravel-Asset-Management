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
        Schema::create('software', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('type');

            $table->string('status');
            $table->boolean('current')->default(true);

            $table->string('licenses')->nullable();
            $table->string('license_period')->nullable();

            $table->foreignId('provaider_id')->index()->constrained()->cascadeOnDelete();

            $table->dateTime('purchased_at');
            $table->dateTime('expired_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};
