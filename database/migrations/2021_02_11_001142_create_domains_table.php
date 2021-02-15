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
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->foreignId('top_level_domain_id')->constrained();
            $table->foreignId('registrar_id')->constrained();
            $table->date('registered_date');
            $table->integer('yearly_cost');
            $table->boolean('will_autorenew')->default(true);
            $table->boolean('has_ssl_certificate')->default(false);
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
        Schema::dropIfExists('domains');
    }
}
