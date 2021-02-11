<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->unsignedBigInteger('top_level_domain_id');
            $table->unsignedBigInteger('registrar_id');
            $table->date('registered_date');
            $table->integer('yearly_cost');
            $table->boolean('will_autorenew')->default(true);
            $table->boolean('has_ssl_certificate')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('top_level_domain_id')
                ->references('id')
                ->on('top_level_domains');

            $table->foreign('registrar_id')
                ->references('id')
                ->on('registrars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
