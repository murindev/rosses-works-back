<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('user_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('surname')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('address_residence')->nullable();
            $table->string('address_registration')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('phone_office')->nullable();
            $table->string('passport_data')->nullable();
            $table->string('marital_status')->nullable();
            $table->text('education_additional')->nullable();
            $table->string('languages')->nullable();
            $table->string('salary_for_probation')->nullable();
            $table->string('salary_after_probation')->nullable();
            $table->string('advantages')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('agreement')->nullable();
            $table->string('military_status')->nullable();
            $table->string('role_id');
            $table->string('title_id');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
