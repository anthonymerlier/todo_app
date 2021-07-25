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
            $table->id();
            $table->string('name', 120);
            $table->text('description')->nullable();
            $table->integer('priority')->default(0);
            $table->string('ref', 60)->unique();
            $table->timestamp('begin_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('tasks');
    }
}
