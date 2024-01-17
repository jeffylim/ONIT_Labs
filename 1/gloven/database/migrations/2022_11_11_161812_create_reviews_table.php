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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_surname');
            $table->string('user_name');
            $table->unsignedBigInteger('product_id');
            $table->double('grade')->nullable();
            $table->text('comment');
            $table->timestamps();

            $table->index('user_id', 'review_user_idx');
            $table->foreign('user_id', 'review_user_fk')->on('users')->references('id')->onDelete('cascade');
            $table->index('product_id', 'review_product_idx');
            $table->foreign('product_id', 'review_product_fk')->on('products')->references('id')->onDelete('cascade');
            $table->unique(['user_id', 'product_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
