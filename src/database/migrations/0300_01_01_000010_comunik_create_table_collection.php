<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComunikCreateTableList extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('comunik_collection'))
        {
            Schema::create('comunik_collection', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('name');

                // customs fields for contacts
                $table->integer('field_group_id')->unsigned()->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('field_group_id', 'fk01_comunik_collection')
                    ->references('id')
                    ->on('admin_field_group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunik_collection');
    }
}