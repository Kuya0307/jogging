<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogging', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('user_id');
            $table->date('date');
            $table->float('distance');
            $table->time('jog_time');
            $table->float('calorie');
            $table->string('course_img_pass')->nullable();
            $table->boolean('jog_env')->default(0);
            $table->boolean('delete_flag')->default(0);
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
        Schema::dropIfExists('jogging');
    }
};
