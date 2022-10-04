<?php

namespace App\Http\Controllers;

use App\Models\CurrencyInformation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currencies = CurrencyInformation::paginate(5);
        return view('dashboard',['title'=>'Currency List','currencies'=>$currencies]);
    }
    public function store()
    {
        $url = 'https://www.cbr.ru/scripts/XML_daily.asp?date_req=02/09/2002';
        $arrContextOptions  =   array(
                                    "ssl"=>array(
                                        "verify_peer"=>false,
                                        "verify_peer_name"=>false,
                                    ),
                                );  
      
        $response       = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $xmlObject      = simplexml_load_string($response);
        $jsonFormat     = json_encode($xmlObject);
        $currencies     = json_decode($jsonFormat, true);
        if (count($currencies['Valute']) > 0) {

            $currency_data = array();
            foreach ($currencies['Valute'] as $index => $data) {
                $currency_data[] = [
                    "id"        => $data['@attributes']['ID'],
                    "name"      => $data['Name'],
                    "num_code"  => $data['NumCode'],
                    "char_code" => $data['CharCode'],
                    "nominal"   => $data['Nominal'],
                    "value"     => $data['Value']
                ];
            }
            CurrencyInformation::insert($currency_data);
        }
        return response()->json(['error'=>false,'success'=>true,'message'=>'Successfully inserted']);
    }
    public function update()
    {
        CurrencyInformation::truncate();
        $url = 'https://www.cbr.ru/scripts/XML_daily.asp?date_req=02/09/2002';
        $arrContextOptions  =   array(
                                    "ssl"=>array(
                                        "verify_peer"=>false,
                                        "verify_peer_name"=>false,
                                    ),
                                );  
      
        $response       = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $xmlObject      = simplexml_load_string($response);
        $jsonFormat     = json_encode($xmlObject);
        $currencies     = json_decode($jsonFormat, true);
        if (count($currencies['Valute']) > 0) {

            $currency_data = array();
            foreach ($currencies['Valute'] as $index => $data) {
                $currency_data[] = [
                    "id"        => $data['@attributes']['ID'],
                    "name"      => $data['Name'],
                    "num_code"  => $data['NumCode'],
                    "char_code" => $data['CharCode'],
                    "nominal"   => $data['Nominal'],
                    "value"     => $data['Value']
                ];
            }
            CurrencyInformation::insert($currency_data);
        }
        return redirect('/currency')->with(['success'=>'Successfully updated']);
    }
}
