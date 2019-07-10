<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Charge;
class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inputcharges');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = Auth::user();
        
            $charges = new Charge;
            $charges->id = $request['nse_or_bse'];
            $charges->intra_buy_sd_percent = $request['intra_buy_sd_percent'];
            $charges->del_buy_sd_percent = $request['del_buy_sd_percent'];
            $charges->intra_buy_stt_percent = $request['intra_buy_stt_percent'];
            $charges->del_buy_stt_percent = $request['del_buy_stt_percent'];
            $charges->intra_buy_b_percent = $request['intra_buy_b_percent'];
            $charges->del_buy_b_percent = $request['del_buy_b_percent'];
            $charges->buy_gst_percent = $request['buy_gst_percent'];
            $charges->intra_buy_trans_charges = $request['intra_buy_trans_charges'];
            $charges->del_buy_trans_charges = $request['del_buy_trans_charges'];
            $charges->intra_sell_sd_percent = $request['intra_sell_sd_percent'];
            $charges->del_sell_sd_percent = $request['del_sell_sd_percent'];
            $charges->intra_sell_stt_percent = $request['intra_sell_stt_percent'];
            $charges->del_sell_stt_percent = $request['del_sell_stt_percent'];
            $charges->intra_sell_b_percent = $request['intra_sell_b_percent'];
            $charges->del_sell_b_percent = $request['del_sell_b_percent'];
            $charges->sell_gst_percent = $request['sell_gst_percent'];
            $charges->intra_sell_trans_charges = $request['intra_sell_trans_charges'];
            $charges->del_sell_trans_charges = $request['del_sell_trans_charges'];
            $charges->save();
           
            return back()->with('status', 'Charges updated!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
