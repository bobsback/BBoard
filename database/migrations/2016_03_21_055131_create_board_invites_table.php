<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function(Blueprint $table)
        {
            $table->increments('id');
            $table->char('access_key', 60)->unique();
            $table->string('email');
            $table->string('pincode');
            $table->integer('board_id')->unsigned();
            $table->timestamps();

            $table->unique(['email', 'board_id']);
            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invites');
    }
}
