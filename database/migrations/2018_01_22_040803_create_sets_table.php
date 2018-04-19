<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('package_id');
            $table->integer('type');
            $table->string('name');
            $table->decimal('price',10,2);
            $table->integer('courses');
            $table->integer('min_pax');
            $table->integer('max_pax');
            $table->string('image');
            $table->string('info');
            $table->integer('featured')->default(0);
            $table->integer('position')->default(1);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sets');
    }
}
