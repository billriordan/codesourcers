<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->longText('code_block');
            $table->integer('user_id');
            $table->integer('tag_id');
            $table->integer('downvotes')->default(0);
            $table->integer('upvotes')->default(0);
            $table->timestamp('start_date')->nullable(); // default will display now
            $table->timestamp('end_date')->nullable(); // the thread will never end
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
        Schema::drop('threads');
    }
}
