<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'categories', function( Blueprint $table )
		{
			$table->id();
			$table->string( 'name' )->unique();
			$table->integer( 'create_by' )->nullable();
			$table->string( 'logo' );
			$table->string( 'placeholder' )->nullable();
			$table->integer( 'status' )->default( 1 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( 'categories' );
	}
}
