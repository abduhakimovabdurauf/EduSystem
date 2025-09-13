<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Emailni olib tashlaymiz
            if (Schema::hasColumn('users', 'email')) {
                $table->dropColumn('email');
                $table->dropColumn('email_verified_at');
            }

            // Phone ustunini qo‘shamiz
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->unique()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->unique()->nullable();
            }

            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }
        });
    }
};
