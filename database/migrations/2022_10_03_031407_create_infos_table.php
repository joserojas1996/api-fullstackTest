<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->string('rut', 45);
            $table->string('name', 45);
            $table->string('lastname', 45);
            $table->string('phone', 45);

            $table->unsignedBigInteger('infoable_id');
            $table->string('infoable_type');

            $table->primary(['infoable_id', 'infoable_type']);

            $table->unsignedBigInteger('address_id')->nullable();
            $table->timestamps();

            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }

}
