<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownTable extends Migration
{

    /**
     * Run the migrations.
     * create town table to store the list of towns based on state and country.
     *
     * @return void
     */
    public function up()
    {
        // create table town
        if (!Schema::hasTable('town')) {
            Schema::create(
                'town',
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('state_id', false, true);
                    $table->string('name', 45);
                    $table->double('latitude')->nullable();
                    $table->double('longitude')->nullable();
                    $table->string('created_by', 45);
                    $table->string('updated_by', 45);
                    $table->timestamps();

                    $table->foreign('state_id')->references('id')->on('state');
                    // composite key
                    $table->unique(['state_id', 'name']);
                }
            );
        } else {
            echo "Table already exists!";
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the table town
        Schema::drop('town');
    }

}
