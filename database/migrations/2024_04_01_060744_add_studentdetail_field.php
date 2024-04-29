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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_approved')->default(0)->nullable();
            $table->string('school_name')->nullable();
            $table->string('class')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */

};
