<?php

namespace App\Http\Controllers;
use App\Activitie;
use App\User;
use Auth;
use App\Stock_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        /**---------------------Total transaction----------------------- */
        $stock_total = Stock_Detail::all()->where('user_id',Auth::id());
        $total_transaction = count($stock_total);
        
        /**---------------------Total Traded Value----------------------- */
        
        $stock_buy_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('buy_price');
        $stock_sell_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('sell_price');
        $total_traded_value = $stock_buy_total + $stock_sell_total;
        $total_traded_value = round($total_traded_value,2);
        
        /**---------------------Total Profit----------------------- */
        
        $profit_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('profit');
        $profit_total = round($profit_total,2);
        /*--------------------------------------------------------------------------------------------*/
        /*------------------------To calculate total expense ---------------------------------------- */
        $buy_stt_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('buy_stt_total');
        $buy_sd_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('buy_sd_total');
        $buy_b_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('buy_b_total');
        $buy_gst_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('buy_gst_total');
        $buy_transactionCharges_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('buy_tc_total');
        $sell_stt_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('sell_stt_total');
        $sell_sd_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('sell_sd_total');
        $sell_b_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('sell_b_total');
        $sell_gst_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('sell_gst_total');
        $sell_transactionCharges_total = Stock_Detail::all()->where('user_id',Auth::id())->sum('sell_tc_total');

        $expense = collect([
                         $buy_stt_total, $buy_sd_total, $buy_b_total, $buy_gst_total, $buy_transactionCharges_total, $sell_stt_total, $sell_sd_total, $sell_b_total, $sell_gst_total, $sell_transactionCharges_total     
                    ]);
        $total_expense = $expense->reduce(function($total_expense, $expense){
                    return $total_expense+$expense;
        });    
        //dd($total_expense);
        $total_expense = round($total_expense,2);
        /*------------------------------------------------------------------------------------------- */ 
        
        
        
        $show_acts = Activitie::get()->where('user_id',Auth::id())->take(-5);//fetch the last 5 records
        
        return view('user.home',compact('show_acts','total_transaction','total_traded_value','profit_total','total_expense'));
        
    }
    public function show($id)
    {
        $present_time = strtotime(Carbon::now());
        $unique_users = User::all()->where('id',$id);
        return view('user.profile',compact('unique_users'));
    }
    public function activities(){
        $logs = Activitie::all()->where('user_id',Auth::id());
        return view('user.activity',compact('logs'));
    }
}
