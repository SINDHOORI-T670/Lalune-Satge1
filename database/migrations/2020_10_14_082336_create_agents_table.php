<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('code');
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->string('image');
            $table->longText('about')->nullable();
            $table->string('tag')->nullable();
            $table->string('twitter')->nullable();
            $table->string('fb')->nullable();
            $table->string('google')->nullable();
            $table->string('linkd')->nullable();
            $table->string('insta')->nullable();
            $table->string('menus')->nullable();
            
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
        Schema::dropIfExists('agents');
    }
}
