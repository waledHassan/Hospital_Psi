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
        Schema::create('earimplants', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable();
            $table->string('l_normal_hear')->nullable();
            $table->string('l_hear_loss')->nullable();
            $table->string('left_hearing_device')->nullable();
            $table->string('l_implant_date')->nullable();
            $table->string('r_normal_hear')->nullable();
            $table->string('r_hear_loss')->nullable();
            $table->string('right_hearing_device')->nullable();
            $table->string('r_implant_date')->nullable();
            $table->string('l_no_device')->nullable();
            $table->string('r_no_device')->nullable();
            $table->string('l_hear_aid')->nullable();
            $table->string('r_hear_aid')->nullable();
            $table->string('l_hear_imp_system')->nullable();
            $table->string('r_hear_imp_system')->nullable();
            $table->string('l_cochlear_implant')->nullable();
            $table->string('r_cochlear_implant')->nullable();
            $table->string('l_cochlear_implant_ear')->nullable();
            $table->string('r_cochlear_implant_ear')->nullable();
            $table->string('l_middle_ear')->nullable();
            $table->string('r_middle_ear')->nullable();
            $table->string('l_bone_implant')->nullable();
            $table->string('r_bone_implant')->nullable();
            $table->string('l_brain_implant')->nullable();
            $table->string('r_brain_implant')->nullable();
            $table->integer('l_hybrid_system')->nullable();
            $table->integer('r_hybrid_system')->nullable();
            $table->integer('l_adhesive_bone')->nullable();
            $table->integer('r_adhesive_bone')->nullable();

            $table->timestamps();
        });

        \DB::statement("INSERT INTO `earimplants` (`id`, `patient_id`, `l_normal_hear`, `l_hear_loss`, `left_hearing_device`, `l_implant_date`, `r_normal_hear`, `r_hear_loss`, `right_hearing_device`, `r_implant_date`, `l_no_device`, `r_no_device`, `l_hear_aid`, `r_hear_aid`, `l_hear_imp_system`, `r_hear_imp_system`, `l_cochlear_implant`, `r_cochlear_implant`, `l_cochlear_implant_ear`, `r_cochlear_implant_ear`, `l_middle_ear`, `r_middle_ear`, `l_bone_implant`, `r_bone_implant`, `l_brain_implant`, `r_brain_implant`, `l_hybrid_system`, `r_hybrid_system`, `l_adhesive_bone`, `r_adhesive_bone`, `created_at`, `updated_at`) VALUES
(22, '35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '2', '2', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, 1, 1, NULL, '2021-04-18 01:11:24'),
(23, '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', NULL, '1', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, '2021-04-18 01:11:24'),
(24, '39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-04-18 01:17:21'),
(25, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, '2021-04-18 01:26:41'),
(26, '41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '2', '1', '1', '2', '1', '1', '2', '2', '1', '1', '1', '2', '1', '1', NULL, NULL, NULL, NULL, NULL, '2021-04-19 10:01:31'),
(27, '42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '2', '1', '1', '2', '1', '1', '2', '2', '1', '1', '1', '2', '1', '1', NULL, NULL, NULL, NULL, NULL, '2021-04-20 17:38:17'),
(28, '43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2', '1', '1', '2', '2', '2', '2', '2', '2', '1', '1', '2', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, '2021-04-20 17:56:20'),
(29, '44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2', '1', '1', '2', '2', '2', '2', '2', '2', '1', '1', '2', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, '2021-04-20 19:43:05'),
(30, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, '2021-04-21 19:29:22'),
(31, '46', '1', '1', 'l_no_device', '2021-05-01', NULL, NULL, '', '', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, '2021-04-24 15:02:46'),
(32, '47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2', '2', '2', '2', '2', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, '2021-04-26 21:52:05'),
(33, '48', NULL, NULL, 'l_hear_aid', '2021-05-29', NULL, NULL, 'r_hear_aid', '2021-05-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-01 06:39:34'),
(34, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-01 14:55:25');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('earimplants');
    }
};
