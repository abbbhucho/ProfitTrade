<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Charges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->integer('id',4);
            $table->double('intra_buy_sd_percent',8,5);
            $table->double('del_buy_sd_percent',8,5);
            $table->double('intra_buy_stt_percent',8,5);
            $table->double('del_buy_stt_percent',8,5);
            $table->double('intra_buy_b_percent',8,5);
            $table->double('del_buy_b_percent',8,5);
            $table->double('buy_gst_percent',8,5);
            $table->double('intra_buy_trans_charges',8,5);
            $table->double('del_buy_trans_charges',8,5);
            $table->double('intra_sell_sd_percent',8,5);
            $table->double('del_sell_sd_percent',8,5);
            $table->double('intra_sell_stt_percent',8,5);
            $table->double('del_sell_stt_percent',8,5);
            $table->double('intra_sell_b_percent',8,5);
            $table->double('del_sell_b_percent',8,5);
            $table->double('sell_gst_percent',8,5);
            $table->double('intra_sell_trans_charges',8,5);
            $table->double('del_sell_trans_charges',8,5);
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
        Schema::dropIfExists('charges');
    }
}
