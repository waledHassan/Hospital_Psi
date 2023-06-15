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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('status')->default(true);
            $table->string('name')->nullable();
        });

        \DB::statement("INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `status`, `name`) VALUES
        (1, NULL, NULL, 1, 'PSI Words'),
        (2, NULL, NULL, 1, 'PSI (Sentences) Card A'),
        (3, NULL, NULL, 1, 'PSI (Sentences) Card B');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
