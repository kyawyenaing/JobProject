<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',255);
            $table->char('email',255);
            $table->char('website',255);
            $table->char('phone',255);
            $table->char('slug',255);
            $table->text('address');
            $table->text('desc');
            $table->integer('staff');
            $table->integer('image_id');
            $table->integer('cover_image_id');
            $table->integer('user_id');
            $table->integer('city_id');
            $table->integer('category_id');
            $table->datetime('establish');
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
        Schema::dropIfExists('companies');
    }
}
