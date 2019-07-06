<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('fulfilled');
            $table->boolean('nse_or_bse');
            $table->string('stock_name');
            $table->double('buy_price',21,10);
            $table->integer('buy_quantity');
            $table->double('buy_gross_total',21,10)->nullable();
            
            $table->double('buy_stt_total',21,10)->nullable();
            
            $table->double('buy_sd_total',21,10)->nullable();
            
            $table->double('buy_b_total',21,10)->nullable();
            
            $table->double('buy_gst_total',21,10)->nullable();
            $table->double('buy_tc_total',21,10)->nullable();
            $table->double('buy_net_total',21,10)->nullable();
            
            $table->double('sell_price',21,10)->nullable();
            $table->integer('sell_quantity');
            $table->double('sell_gross_total',21,10)->nullable();
           
            $table->double('sell_stt_total',21,10)->nullable();
           
            $table->double('sell_sd_total',21,10)->nullable();
           
            $table->double('sell_b_total',21,10)->nullable();
            
            $table->double('sell_gst_total',21,10)->nullable();
            $table->double('sell_tc_total',21,10)->nullable();
            $table->double('sell_net_total',21,10)->nullable();
            $table->double('profit',21,10)->nullable();
            $table->integer('duration')->nullable();
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
        Schema::dropIfExists('stock_details');
    }
}
