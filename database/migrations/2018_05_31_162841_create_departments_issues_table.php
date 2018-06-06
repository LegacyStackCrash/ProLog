<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issues_id')->index();
            $table->foreign('issues_id')->references('id')->on('issues');
            $table->unsignedInteger('departments_id')->index();
            $table->foreign('departments_id')->references('id')->on('departments');
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
        Schema::dropIfExists('departments_issues');
    }
}
