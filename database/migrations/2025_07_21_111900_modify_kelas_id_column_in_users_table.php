<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign('users_kelas_id_foreign');
            // Modify the column type
            $table->string('kelas_id', 100)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Change back to integer
            $table->unsignedBigInteger('kelas_id')->nullable()->change();
            // Recreate the foreign key constraint
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }
};
