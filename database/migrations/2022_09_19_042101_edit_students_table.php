<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2022_09_19_070810_add_dalete_at_to_banners_table.php
        Schema::table('banners', function (Blueprint $table) {
            $table->string('deleted_at');
========
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('delete_at');
>>>>>>>> develop:database/migrations/2022_09_19_042101_edit_students_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2022_09_19_070810_add_dalete_at_to_banners_table.php
        Schema::table('banners', function (Blueprint $table) {
========
        Schema::table('students', function (Blueprint $table) {
>>>>>>>> develop:database/migrations/2022_09_19_042101_edit_students_table.php
            //
        });
    }
};
