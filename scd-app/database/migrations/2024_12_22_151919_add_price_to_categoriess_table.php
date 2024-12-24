<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToCategoriessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoriess', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->after('description'); // Add the price column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoriess', function (Blueprint $table) {
            $table->dropColumn('price'); // Remove the price column
        });
    }
}

