<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * добавляет столбец в таблицу
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
           $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * возвращает его в исходное состояние т.е удаляет.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
};
