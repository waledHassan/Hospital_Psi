<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminroles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        \DB::statement("INSERT INTO `adminroles` (`id`, `name`, `created_at`, `updated_at`) VALUES
        (1, 'doctor', NULL, NULL),
        (2, 'add_doctor', NULL, NULL),
        (3, 'doctor_edit', NULL, NULL),
        (4, 'doctor_delete', NULL, NULL),
        (5, 'patient', NULL, NULL),
        (6, 'add_patient', NULL, NULL),
        (7, 'patient_edit', NULL, NULL),
        (8, 'patient_delete', NULL, NULL),
        (9, 'category', NULL, NULL),
        (10, 'add_category', NULL, NULL),
        (11, 'category_edit', NULL, NULL),
        (12, 'category_delete', NULL, NULL),
        (13, 'level', NULL, NULL),
        (14, 'add_level', NULL, NULL),
        (15, 'level_edit', NULL, NULL),
        (16, 'level_delete', NULL, NULL),
        (17, 'question', NULL, NULL),
        (18, 'add_question', NULL, NULL),
        (19, 'question_edit', NULL, NULL),
        (20, 'question_delete', NULL, NULL),
        (21, 'groups', NULL, NULL),
        (22, 'groups_add', NULL, NULL),
        (23, 'groups_edit', NULL, NULL),
        (24, 'groups_delete', NULL, NULL),
        (25, 'groups_permission', NULL, NULL),
        (26, 'setting', NULL, NULL),
        (27, 'Backup', NULL, NULL);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adminroles');
    }
};
