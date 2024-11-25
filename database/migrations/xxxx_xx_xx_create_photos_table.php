<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
public function up()
{
Schema::create('photos', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('path');
$table->string('category');
$table->timestamps();
});
}

public function down()
{
Schema::dropIfExists('photos');
}
}