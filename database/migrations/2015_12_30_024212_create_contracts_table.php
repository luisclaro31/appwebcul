<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id')->unsigned();
			$table->string('position');
			$table->date('entered_date');
			$table->integer('salary');
			$table->string('contract_type');
			$table->timestamps();
			$table->foreign('employee_id')
					->references('id')
					->on('employees')
					->onDelete('cascade')
					->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contracts');
	}

}
