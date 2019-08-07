<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlteringImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function(Blueprint $table)
        {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function(Blueprint $table)
        {
            $table->dropForeign('images_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
