<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{

    /**
     * Run the migrations.
     * create state table to store the list of states by country.
     *
     * @return void
     */
    public function up()
    {
        // create state table
        if (!Schema::hasTable('state')) {
            Schema::create(
                'state',
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('country_id', false, true); // auto increment false, unsigned true
                    $table->string('name', 45);
                    $table->string('created_by', 45);
                    $table->string('updated_by', 45);
                    $table->timestamps();

                    $table->foreign('country_id')->references('id')->on('country');
                }
            );
        } else {
            echo "Table state already exists";
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the table state
        Schema::drop('state');
    }

}
