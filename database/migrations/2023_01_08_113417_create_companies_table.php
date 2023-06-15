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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('status')->default(true);
            $table->string('name')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('imgvaf')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('currency')->nullable();
            $table->string('facbook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('instrgram')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('header_script')->nullable();
            $table->string('footer_script')->nullable();
            $table->string('default_language')->nullable();
        });

        \DB::statement("INSERT INTO `companies` (`id`, `name`, `img1`, `img2`, `imgvaf`, `address`, `mobile`, `email`, `currency`, `facbook`, `twitter`, `google_plus`, `instrgram`, `meta_title`, `meta_description`, `meta_keyword`, `header_script`, `footer_script`, `default_language`, `updated_at`) VALUES
        (1, 'Pediatric speech Intelligibility', 'assets/images/logo-240744807048.png', 'assets/images/logo-240741624628.png', 'assets/images/fav-icon-240743592517.png', 'Pediatric speech Intelligibility', '+91 9066418026', ' info@saudipsi.com', 'Rs.', 'https://www.facebook.com', 'https://twitter.com', 'https://plus.google.com/', 'https://instagram.com/', '   ', '   ', '   ', '', '', 'english', '2020-05-30 08:08:55');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
