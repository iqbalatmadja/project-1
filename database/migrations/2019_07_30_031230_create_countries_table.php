<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('countryCode',2)->nullable(false);
            $table->string('countryName',100)->nullable(false);
            $table->char('currencyCode',3)->nullable();
            $table->char('fipsCode',2)->nullable();
            $table->char('isoNumeric',4)->nullable();
            $table->string('north',30)->nullable();
            $table->string('south',30)->nullable();
            $table->string('east',30)->nullable();
            $table->string('west',30)->nullable();
            $table->string('capital',30)->nullable();
            $table->string('continentName',100)->nullable();
            $table->char('continent',2)->nullable();
            $table->string('languages',100)->nullable();
            $table->char('isoAlpha3',3)->nullable();
            $table->integer('geonameId')->nullable();
            $table->engine = 'InnoDB';	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
