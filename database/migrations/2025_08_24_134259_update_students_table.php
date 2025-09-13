<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // emailni olib tashlash
            if (Schema::hasColumn('students', 'email')) {
                $table->dropColumn('email');
            }

            // phone ustunini o‘zgartirish (unique + not null)
            $table->string('phone')->unique()->nullable(false)->change();

            // password va remember token qo‘shish
            if (!Schema::hasColumn('students', 'password')) {
                $table->string('password')->after('phone');
            }

            if (!Schema::hasColumn('students', 'remember_token')) {
                $table->rememberToken()->after('password');
            }
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // rollback uchun
            if (!Schema::hasColumn('students', 'email')) {
                $table->string('email')->unique()->nullable();
            }

            if (Schema::hasColumn('students', 'phone')) {
                $table->string('phone')->nullable()->change();
                $table->dropUnique(['phone']);
            }

            if (Schema::hasColumn('students', 'password')) {
                $table->dropColumn('password');
            }

            if (Schema::hasColumn('students', 'remember_token')) {
                $table->dropColumn('remember_token');
            }
        });
    }
};
