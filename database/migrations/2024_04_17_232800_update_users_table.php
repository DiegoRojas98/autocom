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
            $table->string('lastname');
            $table->bigInteger('document')->unique();
            $table->unsignedBigInteger('id_city')->default(1);
            $table->bigInteger('phone');
            $table->boolean('winer')->default(false);

            $table->foreign('id_city')->references('id')->on('citys');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_city_foreign');

            $table->dropColumn('lastname');
            $table->dropColumn('document');
            $table->dropColumn('id_city');
            $table->dropColumn('phone');
            $table->dropColumn('winer');
        });
    }
};
