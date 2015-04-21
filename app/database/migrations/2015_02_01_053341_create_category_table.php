<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create category table
        if (!Schema::hasTable('category')) {
            Schema::create(
                'category',
                function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 100);
                    $table->string('description', 200);
                    $table->string('created_by', 45);
                    $table->string('updated_by', 45);
                    $table->timestamps();
                }
            );
        } else {
            echo "Table category already exists!";
        }

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop the table category
        Schema::drop('category');
	}

}
