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
        Schema::table('products', function (Blueprint $table) {
            //
     
            $table->string('name');
            $table->string('description');
            $table->integer('quantity');
            $table->decimal('price', 8, 2)->default(0.00);
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('quantity');
            $table->dropColumn('price');
            $table->dropColumn('image');

        });
    }
};
