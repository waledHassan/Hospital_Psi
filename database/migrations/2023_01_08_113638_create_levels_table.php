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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('order')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('image_name')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
        });


        \DB::statement("INSERT INTO `levels` (`id`, `category_id`, `order`, `name`, `description`, `image_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Track 1', 'Calibration Tone', 'level-705771317771.jpg', 1, NULL, NULL),
(2, 1, 13, 'Track 13', '', 'level-705771019210.jpg', 1, NULL, NULL),
(3, 1, 2, 'Track 2', '', 'level-705774941716.jpg', 1, NULL, NULL),
(6, 1, 3, 'Track 3', '', 'level-705774574815.jpg', 1, NULL, NULL),
(7, 1, 4, 'Track 4', '', 'level-705773923402.jpg', 1, NULL, NULL),
(8, 1, 5, 'Track 5', '', 'level-705773999872.jpg', 1, NULL, NULL),
(9, 1, 6, 'Track 6', '', 'level-705774710852.jpg', 1, NULL, NULL),
(10, 1, 7, 'Track 7', '', 'level-70577582342.jpg', 1, NULL, NULL),
(11, 1, 8, 'Track 8', '', 'level-705772044328.jpg', 1, NULL, NULL),
(12, 1, 9, 'Track 9', '', 'level-705773125729.jpg', 1, NULL, NULL),
(13, 1, 10, 'Track 10', '', 'level-70577429038.jpg', 1, NULL, NULL),
(14, 1, 11, 'Track 11', '', 'level-705773145931.jpg', 1, NULL, NULL),
(15, 1, 12, 'Track 12', '', 'level-705773195767.jpg', 1, NULL, NULL),
(17, 2, 15, 'Track 15', '', 'level-705773677388.jpg', 1, NULL, NULL),
(18, 2, 16, 'Track 16', '', 'level-70577559514.jpg', 1, NULL, NULL),
(19, 2, 17, 'Track 17', '', 'level-705771140026.jpg', 1, NULL, NULL),
(20, 3, 22, 'Track 22', '', 'level-705771899449.jpg', 1, NULL, NULL),
(21, 3, 23, 'Track 23', '', 'level-705773183502.jpg', 1, NULL, NULL),
(22, 3, 24, 'Track 24', '', 'level-705772684035.jpg', 1, NULL, NULL),
(23, 2, 14, 'Track 14', 'Calibration tune', 'level-70577271138.jpg', 1, NULL, NULL),
(24, 3, 21, 'Track 21', 'Calibration tune', 'level-705772639072.jpg', 1, NULL, NULL),
(26, 2, 18, 'Track 18', '', 'level-705773764044.jpg', 1, NULL, NULL),
(27, 2, 19, 'Track 19', '', 'level-705774553867.jpg', 1, NULL, NULL),
(28, 2, 20, 'Track 20', '', 'level-70577707647.jpg', 1, NULL, NULL),
(29, 3, 25, 'Track 25', '', 'level-705773575711.jpg', 1, NULL, NULL),
(30, 3, 26, 'Track 26', '', 'level-705772537374.jpg', 1, NULL, NULL),
(31, 3, 27, 'Track 27', '', 'level-70577970563.jpg', 1, NULL, NULL);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
};
