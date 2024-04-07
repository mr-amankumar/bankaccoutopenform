<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table='account_opening_forms';
    protected $fillable=['form_number','form_filling_date','form_filling_time','cust_title','cust_first_name','cust_middle_name','cust_last_name','cust_sex','cust_date_of_birth','age','cust_std_code','cust_telephone','cust_mobile','cust_email','cust_state_code','cust_city_code','cust_branch_code','cust_account_type','cust_preferred_language'];
}
