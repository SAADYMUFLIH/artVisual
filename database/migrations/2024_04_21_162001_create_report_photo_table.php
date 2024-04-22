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
        Schema::create('report_photo', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->unsignedBigInteger('report_id')->nullable();
            $table->unsignedBigInteger('foto_id');
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->foreign('foto_id')->references('id')->on('foto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_photo');
    }
};
