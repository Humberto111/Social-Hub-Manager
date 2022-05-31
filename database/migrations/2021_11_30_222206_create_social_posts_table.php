<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_auth_id')->constrained()->cascadeOnDelete();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('comment')->nullable();
            $table->string('hour')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('social_posts');
    }
}
