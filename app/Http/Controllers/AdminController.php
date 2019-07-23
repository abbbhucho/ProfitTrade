<?php

namespace App\Http\Controllers;
use App\Stock_detail;
use App\Activitie;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // find the id of Admin

       /**---------------------Total Users----------------------- */
       $users_total = Stock_Detail::count();
       
       /**---------------------Total Traded Value----------------------- */
       
       $stock_buy_total = Stock_Detail::all()->sum('buy_price');
       $stock_sell_total = Stock_Detail::all()->sum('sell_price');
       $total_traded_value = $stock_buy_total + $stock_sell_total;
       $total_traded_value = round($total_traded_value,2);
       
       /**---------------------Total Profit for admin(here in this case a broker)----------------------- */
       
       $profit_total = Stock_Detail::all()->sum('profit');
       $profit_total = round($profit_total,2);
       /*--------------------------------------------------------------------------------------------*/
       /*------------------------To calculate total expense ---------------------------------------- */
       $buy_stt_total = Stock_Detail::all()->sum('buy_stt_total');
       $buy_sd_total = Stock_Detail::all()->sum('buy_sd_total');
       $buy_b_total = Stock_Detail::all()->sum('buy_b_total');
       $buy_gst_total = Stock_Detail::all()->sum('buy_gst_total');
       $buy_transactionCharges_total = Stock_Detail::all()->sum('buy_tc_total');
       $sell_stt_total = Stock_Detail::all()->sum('sell_stt_total');
       $sell_sd_total = Stock_Detail::all()->sum('sell_sd_total');
       $sell_b_total = Stock_Detail::all()->sum('sell_b_total');
       $sell_gst_total = Stock_Detail::all()->sum('sell_gst_total');
       $sell_transactionCharges_total = Stock_Detail::all()->sum('sell_tc_total');

       $expense = collect([
                        $buy_stt_total, $buy_sd_total, $buy_b_total, $buy_gst_total, $buy_transactionCharges_total, $sell_stt_total, $sell_sd_total, $sell_b_total, $sell_gst_total, $sell_transactionCharges_total     
                   ]);
       $total_expense = $expense->reduce(function($total_expense, $expense){
                   return $total_expense+$expense;
       });    
       $total_expense = round($total_expense,2);
       /*------------------------------------------------------------------------------------------- */ 
       
       $show_acts = Activitie::get()->take(-5);//fetch the last 5 records
       return view('admin.home',compact('show_acts','users_total','total_traded_value','profit_total','total_expense'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peoples = User::all();
        return view('admin.viewusers',compact('peoples'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric|unique:users,phone',
            'address' => 'required|string|min:1',
                
        ]);
        $user = new User;        
        $user->name = $request['name'];        
        $user->email = $request['email'];
        $user->phone = $request['phone'];  
        $user->address = $request['address']; 
        $user->password = Hash::make($request['password']);        
        $user->save();

        return back()->with('success', 'User created successfully.');
        
    }

    /**
     * Display all the stocks.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allStocks(){
        $stocks = Stock_detail::all()->where('fulfilled',1);
        return view('admin.viewallstocks',compact('stocks'));
    }
    public function allactivities(){
        $logs = Activitie::all();
        return view('admin.allActivity',compact('logs'));
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

        $update_users = User::find($id);

        $update_users->name  = $request['name'];
        $update_users->email =  $request['email'];
        $update_users->phone =  $request['phone'];
        $update_users->address =$request['address'];
        $update_users->save();
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function addusers(){
        return view('admin.addusers');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return back();
    }
}
