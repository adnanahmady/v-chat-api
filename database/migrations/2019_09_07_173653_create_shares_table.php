<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('consumer_id');
            $table->unsignedBigInteger('shareable_id');
            $table->string('shareable_type');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('consumer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shares', function (Blueprint $table) {
            $table->dropForeign('shares_user_id_foreign');
            $table->dropForeign(['consumer_id']);
        });

        Schema::dropIfExists('shares');
    }
}
