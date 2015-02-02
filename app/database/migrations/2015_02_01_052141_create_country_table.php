<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{

    /**
     * Run the migrations.
     * create country table store the list of countries.
     *
     * @return void
     */
    public function up()
    {
        // create country table
        if (!Schema::hasTable('country')) {
            Schema::create(
                'country',
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 45);
                    $table->string('code', 5);
                    $table->string('created_by', 45);
                    $table->string('updated_by', 45);
                    $table->timestamps();
                }
            );
        } else {
            echo "Table country already exists!";
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the table country
        Schema::drop('country');
    }

}
