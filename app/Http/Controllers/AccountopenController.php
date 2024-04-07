<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Branch;
use App\Models\City;
use App\Models\User;
use App\Models\Language;
use App\Models\State;



use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccountopenController extends Controller
{

  public function allaccount(){
    $account=Account::all();
  //   $state = State::all();
  // $city = City::all();
  //  $branch = Branch::all();
    return view('account.allaccount',compact('account'));
    

    // return view('account.allaccount', compact('accounts', 'states', 'cities', 'branches'));
  }

  public function accountopen()
  {
    
// Fetching the latest accounts
$state = State::all();
$city = City::all();
$branch = Branch::all();



    return view('account.accountopen',compact('state','city','branch'));
  }


  public function account_store(Request $request)
  {
    //  dd($request->all());
    // $latestaccount = Account::latest()->first();
    // dd($latestaccount);
    // if($latestaccount !=null){
    //   $ids = $latestaccount->id;

    //   $newId = $ids + 1;
    // }
    // else{
    //   $newId='001';
    // }

    // dd($request->title);
    $data = [
      // 'form_number' => 'form_number'->unique(),
      'form_number' => '001',
      'form_filling_date' => now(),
      'form_filling_time' => now(),
      'cust_title' => $request->title, 
      'cust_first_name' => $request->firstname,
      'cust_middle_name' =>  $request->middle,
      'cust_last_name' => $request->lastname,
      'cust_sex' => $request->sex, 
      'cust_date_of_birth' => $request->dob, 
      'age' => $request->age, 
      'cust_std_code' => $request->std, 
      'cust_telephone' => $request->telephone, 
      'cust_mobile' => $request->number, 
      'cust_email' => $request->email,
      'cust_state_id' => $request->state, 
      'cust_city_id' => $request->city, 
      'cust_branch_id' =>$request->branchname, 
      'cust_account_type' => $request->typeaccount, 
      'cust_preferred_language' => $request->preferlanguage,
    ];

    DB::table('account_opening_forms')->insert($data);
    return redirect()->back()->with('message','Account Created successfully');
  }

  public function get_city(Request $request)
  {
    $stateCode = $request->ids;
    $data = City::where('city_state_code', $stateCode)->get();
     return $data;
    // return response()->json(['data'=>$cities]);
  }

  public function get_branch(Request $request)
  {
    $cityCode = $request->ids;
    $data = Branch::where('branch_city_code', $cityCode)->get();
    return $data;

  }
  
}
