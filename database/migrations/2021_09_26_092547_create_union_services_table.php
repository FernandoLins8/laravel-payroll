<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('union_services', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('tax', $total = 8, $places = 2);
            $table->date('date');
            $table->foreignUuid('union_id');
            $table->foreign('union_id')->references('id')->on('union_registrations');
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
        Schema::dropIfExists('union_services');
    }
}
