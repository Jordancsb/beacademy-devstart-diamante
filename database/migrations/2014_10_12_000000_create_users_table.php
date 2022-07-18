<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();

			$table->string('first_name');
			$table->string('last_name');

			$table->string('phone');

			$table->string('birth_date')->nullable();
			$table->text('address')->nullable();
			$table->integer('cep')->nullable();
			$table->timestamp('email_verified_at')->nullable();

			$table->string('cpf')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('admin')->default(false);

			$table->rememberToken();
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
		Schema::dropIfExists('users');
	}
};
