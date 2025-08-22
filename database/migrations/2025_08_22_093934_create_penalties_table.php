<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->integer('amount')->default(5000); // har bir uyga vazifa qilinmasa, 5000 so'm
            $table->string('reason')->nullable(); // optional: "Homework not done"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};
