<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('address')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('phone')->nullable();
            $table->mediumText('info')->nullable();
            $table->mediumText('email')->nullable();
            $table->mediumText('analytic')->nullable();
            $table->mediumText('livechat')->nullable();
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
        Schema::dropIfExists('systems');
    }
}
