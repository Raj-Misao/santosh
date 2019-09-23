<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('empid')->unique();
            $table->string('password');
            $table->string('user_type');
            $table->string('ugroup');
            $table->string('username');
            $table->string('mailid');
            $table->date('doj');
            $table->string('sup');
            $table->string('sup_id');
            $table->string('status');
            $table->string('profile_img')->nullable();
            $table->string('logged_first_time')->default(1);
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
        Schema::dropIfExists('user_info');
    }
}
