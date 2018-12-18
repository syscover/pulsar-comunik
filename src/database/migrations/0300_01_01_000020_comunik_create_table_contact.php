<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComunikCreateTableContact extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('comunik_contact'))
        {
            Schema::create('comunik_contact', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->integer('list_id')->unsigned();
                $table->integer('customer_id')->unsigned()->nullable();
                $table->string('company')->nullable();
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->timestamp('birth_date')->nullable();
                $table->string('lang_id', 2)->nullable();
                $table->string('country_id', 2)->nullable();
                $table->string('prefix', 5)->nullable();
                $table->string('mobile')->nullable();
                $table->string('email')->nullable();
                $table->boolean('unsubscribe_mobile')->default(false);
                $table->boolean('unsubscribe_email')->default(false);

                // data
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->unique(['list_id', 'email'], 'ui01_comunik_contact');

                $table->foreign('list_id', 'fk01_comunik_contact')
                    ->references('id')
                    ->on('comunik_list')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('customer_id', 'fk02_comunik_contact')
                    ->references('id')
                    ->on('crm_customer')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
                $table->foreign('country_id', 'fk03_comunik_contact')
                    ->references('id')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('lang_id', 'fk04_comunik_contact')
                    ->references('id')
                    ->on('admin_lang')
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
        Schema::dropIfExists('comunik_contact');
    }
}