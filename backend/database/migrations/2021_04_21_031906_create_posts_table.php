<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            // ファイル情報
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            // タイトル
            $table->string('title');
            // 詳細
            $table->text('details')->nullable();
            // 購入日
            $table->date('purchase_date')->nullable();
            // メンテナンス内容
            $table->text('maintenance')->nullable();
            // 備考
            $table->text('remarks')->nullable();
            // 更新日
            $table->datetime('update_date');

            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
