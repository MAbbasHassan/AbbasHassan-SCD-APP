<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing ID column
            $table->string('name'); // This will create the 'name' column
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
