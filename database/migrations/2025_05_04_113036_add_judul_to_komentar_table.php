<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->string('judul', 120)->after('wisata_id');
        });
    }

    public function down()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->dropColumn('judul');
        });
    }
};
