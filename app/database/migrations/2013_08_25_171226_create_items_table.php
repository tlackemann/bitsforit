<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('item_id');
			$table->integer('user_id');
			$table->string('title');
			$table->text('body');
			$table->float('price');
			$table->boolean('featured');
			$table->integer('condition');
			$table->string('location');
			$table->text('shipping_details');
			$table->string('bitcoin_address');
			$table->integer('type_id');
			$table->integer('category_id');
			$table->boolean('published');
			$table->timestamp('published_at');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
