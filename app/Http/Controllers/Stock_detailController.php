<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Stock_detail;
use App\Charge;
use DB;
use Auth;
class Stock_detailController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_time = strtotime(Carbon::now());
        $views = Stock_detail::all()->where('user_id',Auth::user()->id)->where('fulfilled',0);
        $stock_name = Stock_detail::get()->where('user_id',Auth::user()->id)->groupBy('stock_name');
        
        // $orig_quant = DB::select(DB::raw("SELECT buy_quantity
        //                         FROM stock_details
        //                         WHERE stock_name IN (
        //                         SELECT stock_name 
        //                         FROM stock_details 
        //                         GROUP BY stock_name 
        //                         HAVING COUNT(*) > 1
        //                     )"));
        // $orig_quant = Stock_detail::where('user_id',Auth::user()->id)
        //                 ->groupBy('stock_name')
        //                 ->get('buy_quantity');

        //$orig = max($orig_quant); 
        //dd($stock_name);                   
        return view('user.viewstocks',compact('views','current_time'));
    }
    public function history()
    {
        $fulfilled=1;
           
            $stocks = Stock_detail::all()->where('user_id',Auth::user()->id);
            if(count($stocks)>0){
                $flags = 1;
                
            }
            
            return view('user.history',compact('stocks'));
            
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
        
       //------------------------------------------Request Variables----------------------------------------------------
        $stock_name = $request['stock_name'];
        $buy_stock_quantity = $request['stock_quantity'];
        $buy_stock_price =  $request['stock_price'];
        $sell_stock_quantity = $request['sell_stock_quantity'];
        $sell_stock_price =  $request['sell_stock_price'];
        $nse_or_bse = $request['exampleRadios'];

        $user_id = $usr->id;
        // ----------------------------------------Input values--------------------------------------------------------------------------------------
        $stockdetail = new Stock_detail;
        $stockdetail->stock_name = $stock_name;
        $stockdetail->buy_quantity = $buy_stock_quantity;
        $stockdetail->buy_price = $buy_stock_price;
        $stockdetail->sell_quantity = $sell_stock_quantity;
        $stockdetail->sell_price = $sell_stock_price;
        $stockdetail->user_id = $user_id;
        $stockdetail->fulfilled = 1;
        // ----------------------------------------Condition to check fulfilled stock or not--------------------------------------------------------------------------------------
        $fulfilled = 1;
        if($buy_stock_quantity > $sell_stock_quantity)
        {
            $stockdetail->fulfilled = 1;//stocks are left
            $fulfilled = 0;
        }
        else if($buy_stock_quantity == $sell_stock_quantity){
            $stockdetail->fulfilled = 0;//no stock left
            $fulfilled = 1;
        }
        else{
                //buy_stock_price < sell_stock_price
        }
        
        //----------------------------------------Figure out NSE or BSE--------------------------------------------------------------------------------------
        $stockdetail->nse_or_bse = $nse_or_bse;
        //for NSE  
        if($nse_or_bse == '0'){
            $id = 1;
            $price = Charge::all()->where('id',1);
            //----------------------------------------Calculations related to buy--------------------------------------------------------------------------------------
            $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);            
            $stockdetail->buy_gross_total =  $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);
            $stockdetail->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges);        
            $stockdetail->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent);
            $stockdetail->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent);
            $stockdetail->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_net_total =($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
        
            //----------------------------------------Calculations related to sell--------------------------------------------------------------------------------------       $sell_stock_price = $request['sell_stock_price'];
            $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
            
            $stockdetail->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
            $stockdetail->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges); 
            $stockdetail->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent);
            $stockdetail->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent);
            $stockdetail->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
            $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
            //dd($profit_calc);
            $stockdetail->profit = $profit_calc;
            $stockdetail->save();
            
            
            //----------------------check---------------------------
            if($fulfilled == 0 ){
            $new_stock_quantity = $buy_stock_quantity - $sell_stock_quantity;
            $stockdetail_2 = new Stock_detail;
            $stockdetail_2->fulfilled = $fulfilled; 
            $stockdetail_2->user_id = $usr->id;
            $stockdetail_2->stock_name = $stock_name;
            $stockdetail_2->buy_quantity = $new_stock_quantity;
            $stockdetail_2->buy_price = $buy_stock_price;
           
            $stockdetail_2->nse_or_bse = $nse_or_bse;
            //------------------------calculation for buy in left stocks-------------------------------------------------------------------------------------------------
            $buy_gross_total2 = $this->cal_buy_gross_total($buy_stock_price, $new_stock_quantity);
            $stockdetail_2->buy_gross_total =  $buy_gross_total2;
            $stockdetail_2->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$new_stock_quantity,$price[0]->buy_trans_charges);
            $stockdetail_2->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent);
            $stockdetail_2->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent);
            $stockdetail_2->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total2,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail_2->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total2,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail_2->buy_net_total =($buy_gross_total2)+($this->cal_buy_tc_total($buy_stock_price,$new_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
            
            $stockdetail_2->save();
            return redirect('dashboard/');
            }
        }
        else
        {
            $id = 2;
            $price = Charge::all()->where('id',2);
            
            //----------------------------------------Calculations related to buy--------------------------------------------------------------------------------------
            $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);            
            $stockdetail->buy_gross_total =  $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);
            $stockdetail->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges);        
            $stockdetail->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent);
            // dd($stockdetail->buy_b_total);
            $stockdetail->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent);
            $stockdetail->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_net_total =($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
        
            //----------------------------------------Calculations related to sell--------------------------------------------------------------------------------------       $sell_stock_price = $request['sell_stock_price'];
            $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
            
            $stockdetail->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
            $stockdetail->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges); 
            $stockdetail->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent);
            $stockdetail->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent);
            $stockdetail->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
            $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
            //dd($profit_calc);
            $stockdetail->profit = $profit_calc;
            
            $stockdetail->save();
            
            
            //----------------------check---------------------------
            if($fulfilled == 0 ){
            $new_stock_quantity = $buy_stock_quantity - $sell_stock_quantity;
            $stockdetail_2 = new Stock_detail;
            $stockdetail_2->fulfilled = 0; 
            $stockdetail_2->user_id = $usr->id;
            $stockdetail_2->stock_name = $stock_name;
            $stockdetail_2->buy_quantity = $new_stock_quantity;
            $stockdetail_2->buy_price = $buy_stock_price;
           
            $stockdetail_2->nse_or_bse = $nse_or_bse;
            //------------------------calculation for buy in left stocks-------------------------------------------------------------------------------------------------
            $buy_gross_total2 = $this->cal_buy_gross_total($buy_stock_price, $new_stock_quantity);
            $stockdetail_2->buy_gross_total =  $buy_gross_total2;
            $stockdetail_2->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$new_stock_quantity,$price[1]->buy_trans_charges);
            $stockdetail_2->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent);
            $stockdetail_2->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent);
            $stockdetail_2->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total2,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail_2->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total2,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail_2->buy_net_total =($buy_gross_total2)+($this->cal_buy_tc_total($buy_stock_price,$new_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
            
            $stockdetail_2->save();

            return redirect('dashboard/');
          
          }
        }
        
        
    }
    protected function cal_buy_gross_total($var1, $var2){
            return $var2*$var1;
    }
    protected function cal_buy_tc_total( $var1, $var2, $var3){
            $var3 = $var3/100;
            return ($var1*$var2)/100 *($var3); 
    }
    public function cal_buy_b_total($var1,$var2){
            
            $var2 = $var2/100;
            $cal = ($var1*$var2);
            if($cal < 20){
                return $cal;
            }else{
                return 20;
            }
    }
    protected function cal_buy_gst_total( $var1, $var2, $var3, $var4){
            $var3 = $var3/100;
            $var4 = $var4/100;
            
            return $var1*$var4;
    }
    protected function cal_buy_stt_total( $gt, $del_stt_charge,$intra_stt_charge,$sell_quantity,$sell_price){
            if($sell_quantity && $sell_price != null){
                    $val = ($gt*$intra_stt_charge)/100;
                    return $val;
            }else{
                    $val = ($gt*$del_stt_charge)/100;
                    return $val;
            }   
    }
    protected function cal_buy_sd_total($gt,$del_sd_charge,$intra_sd_charge,$sell_quantity,$sell_price){
        if($sell_quantity && $sell_price != null){
            $val = ($gt*$intra_sd_charge)/100;
            return $val;
        }else{
            $val = ($gt*$del_sd_charge)/100;
            return $val;
        }   
    
       
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
  
        }
       
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     /*
      * Sell the stocks 
     */
    public function sell(Request $request, $id){
       
       
        
        $sell = Stock_detail::find($id);
        
        $stock_name = $sell->stock_name;
        $buy_stock_quantity = $sell->buy_quantity;
        $buy_stock_price =  $sell->buy_price;
        $sell_stock_quantity = $request['sell_stock_quantity'];
        $sell_stock_price =  $request['sell_price'];
        $nse_or_bse = $sell->nse_or_bse;
        $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);  
        if($buy_stock_quantity > $sell_stock_quantity){
            // ------------------------for NSE---------------------------------------------
            if($nse_or_bse == '0'){
                $sell->sell_price = $sell_stock_price;
                $sell->sell_quantity = $sell_stock_quantity;
                $sell->fulfilled = 1;
                $price = Charge::all()->where('id',1);
                /**------------Calculations related to sell------------------------------------- */
                $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
                
                $sell->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
                $sell->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges); 
                $sell->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent);
                $sell->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent);
                $sell->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
                $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
                //dd($profit_calc);
                $sell->profit = $profit_calc;
                $sell->save();
                
                //---------------------------------------Record a new data for the left stocks------------------------------
                $stockdetail = new Stock_detail;
                $stockdetail->stock_name = $stock_name;
                $stockdetail->buy_quantity = $buy_stock_quantity - $sell_stock_quantity;
                $stockdetail->buy_price = $buy_stock_price;
                $stockdetail->user_id = Auth::id();
                $stockdetail->fulfilled = 0;
                $stockdetail->sell_price = null;
                $stockdetail->sell_quantity = null;
                $stockdetail->nse_or_bse = $nse_or_bse;
                //----------------------------------------Calculations related to buy--------------------------------------------------------------------------------------
                $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);            
                $stockdetail->buy_gross_total =  $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);
                $stockdetail->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges);        
                $stockdetail->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent);
                $stockdetail->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent);
                $stockdetail->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
                $stockdetail->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
                $stockdetail->buy_net_total =($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
            
                $stockdetail->save();
                return back();

            }
            // ------------------------for BSE---------------------------------------------
            else{
                $sell->sell_price = $sell_stock_price;
                $sell->sell_quantity = $sell_stock_quantity;
                $sell->fulfilled = 1;
                $price = Charge::all()->where('id',2);

                /**------------Calculations related to sell------------------------------------- */
                $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
            
                $sell->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
                $sell->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges); 
                $sell->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent);
                $sell->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent);
                $sell->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
                $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
                //dd($profit_calc);
                $sell->profit = $profit_calc;
                $sell->save();
                //---------------------------------------Record a new data for the left stocks------------------------------
                $stockdetail = new Stock_detail;
                $stockdetail->stock_name = $stock_name;
                $stockdetail->buy_quantity = $buy_stock_quantity - $sell_stock_quantity;
                $stockdetail->buy_price = $buy_stock_price;
                $stockdetail->user_id = Auth::id();
                $stockdetail->fulfilled = 0;
                $stockdetail->sell_price = null;
                $stockdetail->sell_quantity = null;
                $stockdetail->nse_or_bse = $nse_or_bse;
                //----------------------------------------Calculations related to buy--------------------------------------------------------------------------------------
                $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);            
                $stockdetail->buy_gross_total =  $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);
                $stockdetail->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges);        
                $stockdetail->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent);
                $stockdetail->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent);
                $stockdetail->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
                $stockdetail->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
                $stockdetail->buy_net_total =($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
            
                $stockdetail->save();
                return back();
               
            }
        }
        /*--------------------------------------all stocks are sold------------------------------------------------*/
        elseif($buy_stock_quantity == $sell_stock_quantity){
            
            // ------------------------for NSE---------------------------------------------
            if($nse_or_bse == '0'){
                $sell->sell_price = $sell_stock_price;
                $sell->sell_quantity = $sell_stock_quantity;
                $sell->fulfilled = 1;
                $price = Charge::all()->where('id',1);
                /**------------Calculations related to sell------------------------------------- */
                $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
                
                $sell->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
                $sell->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges); 
                $sell->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent);
                $sell->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent);
                $sell->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
                $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
                //dd($profit_calc);
                $sell->profit = $profit_calc;
                $sell->save();
                return back();
            }
            // ------------------------for BSE---------------------------------------------
            else{
                $sell->sell_price = $sell_stock_price;
                $sell->sell_quantity = $sell_stock_quantity;
                $sell->fulfilled = 1;
                $price = Charge::all()->where('id',2);

                /**------------Calculations related to sell------------------------------------- */
                $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
            
                $sell->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
                $sell->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges); 
                $sell->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent);
                $sell->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent);
                $sell->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
                $sell->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
                $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
                $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
                //dd($profit_calc);
                $sell->profit = $profit_calc;
                $sell->save();
                return back();
            }
             
        } 
        else{
                //negative sell stocks sell quantity is more than buy quantity
        }
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
        $usr = Auth::user();
        
        
       //------------------------------------------Request Variables----------------------------------------------------
        
      
        $stock_name = $request['stock_name'];
        $buy_stock_quantity = $request['buy_stock_quantity'];
        $buy_stock_price =  $request['buy_stock_price'];
        $sell_stock_quantity = $request['sell_stock_quantity'];
        $sell_stock_price =  $request['sell_stock_price'];
        $nse_or_bse = $request['nse_or_bse'];

        $user_id = $usr->id;
        // ----------------------------------------Input values--------------------------------------------------------------------------------------
   
        $stockdetail = Stock_detail::find($id);
        $stockdetail->stock_name  = $stock_name;
        $stockdetail->buy_quantity = $buy_stock_quantity;
        $stockdetail->buy_price = $buy_stock_price;
        $stockdetail->sell_quantity = $sell_stock_quantity;
        $stockdetail->sell_price = $sell_stock_price;
        $stockdetail->user_id = $user_id;
        $stockdetail->fulfilled = 1;
        // ----------------------------------------Condition to check fulfilled stock or not--------------------------------------------------------------------------------------
        $fulfilled = 1;
        if($buy_stock_quantity > $sell_stock_quantity)
        {
            $stockdetail->fulfilled = 0;//stocks are left
            $fulfilled = 0;
        }
        else if($buy_stock_quantity == $sell_stock_quantity){
            $stockdetail->fulfilled = 1;//no stock left
            $fulfilled = 1;
        }
        else{
                //buy_stock_price < sell_stock_price
        }
        //dd($fulfilled);
      
        //----------------------------------------Figure out NSE or BSE--------------------------------------------------------------------------------------
        $stockdetail->nse_or_bse = $nse_or_bse;
        //for NSE  
        if($nse_or_bse == '0'){
            $charges_id = 1;
            $price = Charge::all()->where('id',1);
            //----------------------------------------Calculations related to buy--------------------------------------------------------------------------------------
            $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);            
            $stockdetail->buy_gross_total =  $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);
            $stockdetail->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges);        
            $stockdetail->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent);
            $stockdetail->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent);
            $stockdetail->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_net_total =($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
        
            //----------------------------------------Calculations related to sell--------------------------------------------------------------------------------------       $sell_stock_price = $request['sell_stock_price'];
            $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
            
            $stockdetail->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
            $stockdetail->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges); 
            $stockdetail->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent);
            $stockdetail->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent);
            $stockdetail->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[0]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[0]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[0]->sell_b_percent,$price[0]->sell_trans_charges,$price[0]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[0]->del_sell_stt_percent,$price[0]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[0]->del_sell_sd_percent,$price[0]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[0]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[0]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[0]->buy_b_percent,$price[0]->buy_trans_charges,$price[0]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[0]->del_buy_stt_percent,$price[0]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[0]->del_buy_sd_percent,$price[0]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
            $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
            //dd($profit_calc);
            $stockdetail->profit = $profit_calc;  
            $stockdetail->save();
            
        }
        else
        {
            $charges_id = 2;
            $price = Charge::all()->where('id',2);
            
            //----------------------------------------Calculations related to buy--------------------------------------------------------------------------------------
            $buy_gross_total = $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);            
            $stockdetail->buy_gross_total =  $this->cal_buy_gross_total($buy_stock_price, $buy_stock_quantity);
            $stockdetail->buy_tc_total =  $this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges);        
            $stockdetail->buy_b_total = $this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent);
            $stockdetail->buy_gst_total = $this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent);
            $stockdetail->buy_stt_total = $this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_sd_total = $this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->buy_net_total =($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$sell_stock_price));
        
            //----------------------------------------Calculations related to sell--------------------------------------------------------------------------------------       $sell_stock_price = $request['sell_stock_price'];
            $sell_gross_total = $this->cal_buy_gross_total($sell_stock_price, $sell_stock_quantity);
            
            $stockdetail->sell_gross_total = $this->cal_buy_gross_total($sell_stock_price,$sell_stock_quantity);
            $stockdetail->sell_tc_total = $this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges); 
            $stockdetail->sell_b_total = $this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent);
            $stockdetail->sell_gst_total = $this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent);
            $stockdetail->sell_stt_total = $this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_sd_total = $this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price);
            $stockdetail->sell_net_total = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_sell = $sell_gross_total+($this->cal_buy_tc_total($sell_stock_price,$sell_stock_quantity,$price[1]->sell_trans_charges))+($this->cal_buy_b_total($sell_stock_price,$price[1]->sell_b_percent))+($this->cal_buy_gst_total($sell_stock_price,$price[1]->sell_b_percent,$price[1]->sell_trans_charges,$price[1]->sell_gst_percent))+($this->cal_buy_stt_total($sell_gross_total,$price[1]->del_sell_stt_percent,$price[1]->intra_sell_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($sell_gross_total,$price[1]->del_sell_sd_percent,$price[1]->intra_sell_sd_percent,$sell_stock_quantity,$sell_stock_price));
            $total_buy = (($buy_gross_total)+($this->cal_buy_tc_total($buy_stock_price,$buy_stock_quantity,$price[1]->buy_trans_charges))+($this->cal_buy_b_total($buy_stock_price,$price[1]->buy_b_percent))+($this->cal_buy_gst_total($buy_stock_price,$price[1]->buy_b_percent,$price[1]->buy_trans_charges,$price[1]->buy_gst_percent))+($this->cal_buy_stt_total($buy_gross_total,$price[1]->del_buy_stt_percent,$price[1]->intra_buy_stt_percent,$sell_stock_quantity,$sell_stock_price))+($this->cal_buy_sd_total($buy_gross_total,$price[1]->del_buy_sd_percent,$price[1]->intra_buy_sd_percent,$sell_stock_quantity,$buy_stock_price)))/$buy_stock_quantity;
            $profit_calc = $total_sell - $total_buy*$sell_stock_quantity;
            //dd($profit_calc);
            $stockdetail->profit = $profit_calc;  
            $stockdetail->save();
            
        }        
            return redirect('dashboard/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Stock_detail::find($id);
        $delete->delete();
        return back();
    }
        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'stock_name' => ['required', 'string', 'max:255'],
            'stock_quantity' => ['required', 'integer'],
            'stock_price' => ['required'],
            'optradio' => ['required'],
        ], [    
            'stock_name.required' => 'Please provide the stock name',
            'stock_name.max' => 'Stock Name Word Limit Exceeded',
            'stock_quantity.required' => 'Please provide the stock quantity',
            'stock_quantity.integer' => 'The stock quantity must be an integer',
            'stock_price.required' => 'Please provide the stock price',
            'optradio.required' => 'Please choose NSE or BSE',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create()
    {
        
    }
}
