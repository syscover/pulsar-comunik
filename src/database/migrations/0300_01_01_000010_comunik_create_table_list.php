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
        if(! Schema::hasTable('comunik_list'))
        {
            Schema::create('comunik_list', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('name');

                // customs fields
                $table->integer('field_group_id')->unsigned()->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('field_group_id', 'fk01_comunik_list')
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
        Schema::dropIfExists('comunik_list');
    }
}