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
        Schema::create('profile_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->text('about')->nullable();
            $table->boolean('is_about_private')->nullable();
            $table->string('facebook')->nullable();
            $table->boolean('is_facebook_private');
            $table->string('linkedin')->nullable();
            $table->boolean('is_linkedin_private');
            $table->string('instagram')->nullable();
            $table->boolean('is_instagram_private')->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
        Schema::dropIfExists('profile_attributes');
    }
};
