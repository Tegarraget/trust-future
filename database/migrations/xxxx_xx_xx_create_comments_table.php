<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->string('photo_path');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('comments')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}; 