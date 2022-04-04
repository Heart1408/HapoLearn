<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->time('birthday')->nullable();
            $table->string('avartar')->nullable();
            $table->integer('role')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fullname');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('birthday');
            $table->dropColumn('avartar');
            $table->dropColumn('role');
            $table->dropSoftDeletes();
        });
    }
}
