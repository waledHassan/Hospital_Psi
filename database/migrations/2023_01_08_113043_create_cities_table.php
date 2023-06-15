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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('status')->default(true);
            $table->string('name')->nullable();
            $table->integer('country_id')->nullable();
        });


        \DB::statement("INSERT INTO `cities` (`id`, `country_id`, `status`, `name`) VALUES
        (2, 4, 1, 'Riyadh');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
