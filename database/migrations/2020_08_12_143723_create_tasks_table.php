<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {


            $table->increments('id');

            $table->string('task_name', 30);
            $table->string('description_task')->nullable();
            $table->string('urgency', '10')->nullable();
            $table->string('state', '10')->nullable();


            $table->Integer('list_id')->unsigned()->default(1)->index();
            $table->foreign('list_id')->references('id')->on('task_lists')->onDelete('cascade');
            $table->timestamps();
/*            $table->dropForeign(['list_id']);*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
