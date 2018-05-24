<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->references('id')->on('customers');
            $table->string('issue_name');
            $table->char('issue_status', 1);
            $table->text('issue_details');
            $table->dateTime('issue_date_time');
            $table->dateTime('issue_date_time_completed');
            $table->integer('issue_duration_days');
            $table->integer('issue_duration_hours');
            $table->integer('issue_duration_minutes');
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
        Schema::dropIfExists('issues');
    }
}
