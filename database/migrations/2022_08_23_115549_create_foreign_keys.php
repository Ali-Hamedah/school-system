<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('grades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('my__parents', function (Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');
        });
        Schema::table('parent_attachments', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my__parents');
        });

    }

    public function down()
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropForeign('classrooms_Grade_id_foreign');
        });
    }
}
