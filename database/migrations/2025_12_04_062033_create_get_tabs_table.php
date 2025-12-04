<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('get_tabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('getall_id')->constrained('getalls')->onDelete('cascade');
            $table->string('icon')->nullable();
            $table->string('tab_title');
            $table->text('tab_description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('get_tabs');
    }
};
