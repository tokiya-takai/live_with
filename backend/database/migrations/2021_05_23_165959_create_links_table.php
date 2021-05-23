<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->unique();
            $table->text('link1')->default("");
            $table->text('link2')->default("");
            $table->text('link3')->default("");
            $table->text('link4')->default("");
            $table->text('link5')->default("");
            $table->timestamps();

            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('links');
    }
}
