<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChargesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('charges')->insert([
            'intra_buy_sd_percent' => 0.00200,
            'del_buy_sd_percent' => 0.01000,
            'intra_buy_stt_percent' => 0.00100,
            'del_buy_stt_percent'=> 0.02500,
            'intra_buy_b_percent'=> 0.02500,
            'del_buy_b_percent'=> 18.00000,
            'buy_gst_percent'=> 0.00190,
            'intra_buy_trans_charges'=> 0.01000,
            'del_buy_trans_charges'=> 0.01000,
            'intra_sell_sd_percent'=> 0.00200,
            'del_sell_sd_percent'=> 0.00700,
            'intra_sell_stt_percent'=> 0.01700,
            'del_sell_stt_percent'=> 0.05000,
            'intra_sell_b_percent'=> 0.02500,
            'del_sell_b_percent'=> 0.05000,
            'sell_gst_percent'=> 18.00000,
            'intra_sell_trans_charges'=> 0.00190,
            'del_sell_trans_charges'=> 0.00300,
        ]);
        DB::table('charges')->insert([
            'intra_buy_sd_percent' => 0.00200,
            'del_buy_sd_percent' => 0.00500,
            'intra_buy_stt_percent' => 0.02500,
            'del_buy_stt_percent'=> 0.03000,
            'intra_buy_b_percent'=> 0.02500,
            'del_buy_b_percent'=> 18.00000,
            'buy_gst_percent'=> 0.00190,
            'intra_buy_trans_charges'=> 0.01000,
            'del_buy_trans_charges'=> 0.01000,
            'intra_sell_sd_percent'=> 0.00200,
            'del_sell_sd_percent'=> 0.00700,
            'intra_sell_stt_percent'=> 0.01700,
            'del_sell_stt_percent'=> 0.05000,
            'intra_sell_b_percent'=> 0.02500,
            'del_sell_b_percent'=> 0.05000,
            'sell_gst_percent'=> 18.00000,
            'intra_sell_trans_charges'=> 0.00190,
            'del_sell_trans_charges'=> 0.00300,
        ]);
    }
}
