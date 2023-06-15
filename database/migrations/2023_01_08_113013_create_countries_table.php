<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('status')->default(true);
            $table->string('name')->nullable();
        });


        \DB::statement("INSERT INTO `countries` (`id`, `status`, `name`) VALUES
        (4, 1, 'Saudi'),
        (5, 1, 'Non Saudi');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
