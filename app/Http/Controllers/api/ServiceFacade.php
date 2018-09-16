<?php

namespace App\Http\Controllers\Api;

use Sabre\Xml\Service;

class ServiceFacade
{


    public $data = [
        'error' => 0,
        'data' => null,
        'msg' => 'Success',
    ];

    public function __construct($data=null)
    {
        $this->data['data'] = $data;
    }

    public function responseData($response=null, $request){
        if(isset($response['data'])){
            $this->data['data'] = $response['data'];
        }
        if(isset($response['error'])){
            $this->data['error'] = $response['error'];
        }
        if($this->data['error'] != 0){
            $this->data['msg'] = trans('http.'.$this->data['error']);
        }
        $method = (array)$request->segments();
        $method = $method[count($method)-1];
        $this->saveLog(['app' => $this->getMerchant($request), 'method' => $method, 'request' => json_encode($request->all()), 'response' => json_encode($this->data), 'status' =>  $this->data['error'], 'created_at' => date('Y-m-d H:i:s')]);

        header('Content-Type: application/json');
        die(json_encode($this->data));

    }


    public function saveLog($args){
        \DB::table('apiLogs')->insert($args);
    }


    private function getMerchant($request){
        foreach (config('api.apps') as $index => $key){
            if($request->header('apiKey') == md5($key)){
                return $key;
            }
        }
    }


    public function payWithBOG($arg){
        $url = 'https://api.fintech.ge/api/Transfers/TransferOut';
        $data = (object)[
            'SrcAcctKey' => $arg['from'],
            'BenefAcctNo' => $arg['to'],
            'BenefName' => $arg['companyName'],
            'PayerName' => $arg['username'],
            'Amount' => $arg['price'],
            'Ccy' => 'Gel',
            'Nomination' => 'Buy Coupon'
        ];

        $this->payment($url, $data);
    }

    private function payment($url, $data){
        $ch = curl_init( $url );
        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);

    }


}
