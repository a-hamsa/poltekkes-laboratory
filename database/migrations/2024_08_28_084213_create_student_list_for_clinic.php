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
        Schema::create('student_list_for_d3_t1', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
        Schema::create('student_list_for_d3_t2', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
        Schema::create('student_list_for_d3_t3', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
        Schema::create('student_list_for_d4_t1', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
        Schema::create('student_list_for_d4_t2', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
        Schema::create('student_list_for_d4_t3', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
        Schema::create('student_list_for_d4_t4', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('class');
            $table->string('tk_smt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_list_for_clinic');
    }
};
