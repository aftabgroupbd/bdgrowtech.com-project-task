<?php

namespace App\Http\Controllers;

use App\Models\CurrencyInformation;
use App\Models\LogTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ApiController extends Controller
{
    /**
     * generate static authentication key
     *
     * @return \Illuminate\Http\Response
     */
    public function generateToken()
    {
        $token = uniqid(base64_encode(Str::random(40)));
        return $token;
    }
    /**
     * get single currency information by currency code
     *
     * @return \Illuminate\Http\Response
     */
    public function currencyInfo(Request $request,$code)
    {
        $ip = $request->ip();
        $currency = CurrencyInformation::where('char_code',$code)->first();
        if($currency != false)
        {
            $this->StoreLog($ip,1,'Successfully get single currency info');
            return response()->json(array('error' => false,'success' => true, 'message'=> 'success', 'data' => $currency)); 
        }
        $this->StoreLog($ip,0,'Trying to get single currency information but failed');
        return response()->json(array('error' => true,'success' => false, 'message'=> 'Data not found', 'data' => '')); 
    }
    /**
     * save api call log
     *
     * @return \Illuminate\Http\Response
     */
    public function StoreLog($ip,$status,$comment)
    {
        $values = array(
                    'request_ip'    => $ip,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'status'        => $status,
                    'comments'      => $comment
                );
        DB::table('log_table')->insert($values);
    }
}
