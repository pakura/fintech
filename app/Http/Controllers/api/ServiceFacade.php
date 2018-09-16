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


    public function getStaffAvaiableTimes($request){
        $service = (new Services)->where('id', $request->get('service_id'))->first();
        $weekDay = date('N', strtotime($request->get('day')));
        $craftsmen = (new Craftsmen)->where('sector', $request->get('type_id'))->pluck('id');
        $weekTimes = \DB::table('staff_dates')->where('services_id', $service->id)->whereIn('staff_id', $craftsmen)->get();
        $staffs = [];
        foreach ($weekTimes as $key => $weekTime){
            $orderDayTimes = (array)$weekTime;
            if($orderDayTimes['day'.$weekDay.'_from'] == ''){
                unset($weekTimes[$key]);
                continue;
            }
            $orderDayTimes = [$orderDayTimes['day'.$weekDay.'_from'],$orderDayTimes['day'.$weekDay.'_to']];
            $staffCustomDayTimes = \DB::table('staff_custom_date')
                ->where('services_id', $service->id)
                ->where('staff_id', $weekTime->staff_id)
                ->where('day', $request->get('day'))
                ->first();

            if($staffCustomDayTimes){
                if($staffCustomDayTimes->from != ''){
                    $orderDayTimes[0] = $staffCustomDayTimes->from;
                    $orderDayTimes[1] = $staffCustomDayTimes->to;
                } else {
                    unset($weekTimes[$key]);
                }
            }
            $staffs[$weekTime->staff_id] = [$orderDayTimes[0], $orderDayTimes[1]];
        }
        $availableTimes = [];
        foreach ($staffs as $id => $times){
            $from = date('G', strtotime($times[0]));
            $to = date('G', strtotime($times[1]));
            for($i=$from; $i<$to; $i++){
                $res = (new Schedules)
                    ->where('service_id', $service->id)
                    ->where('staff_id', $id)
                    ->where('start', $request->get('day'))
                    ->where('time_start', ($i<10)?'0'.$i.':00:00':$i.':00:00')
                    ->first();
                if(!$res || ($res->status == 0 && strtotime($res->created_at)<(time()-60*5))){
                    if($service->slug == 'khelosnis-gamodzakheba'){
                        $type = (new CraftsmenTypes)->where('id', $request->get('type_id'))->first();
                    }
                    $prices = \DB::table('craftsmen_type_customprice')
                        ->where('service_id', $service->id)
                        ->where('service_type_id', $request->get('type_id'))
                        ->where('day', $weekDay)
//                        ->where('from', '>=', ($i<10)?'0'.$i.':00:00':$i.':00:00')
//                        ->where('to', '<', ($i<10)?'0'.$i.':00:00':$i.':00:00')
                        ->get();
                    if(!isset($availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00'])){
                        $customPrice = null;
                        foreach ($prices as $price){
                            if(strtotime($price->from) <= strtotime(($i<10)?'0'.$i.':00:00':$i.':00:00') && strtotime($price->to) > strtotime(($i<10)?'0'.$i.':00:00':$i.':00:00')){
                                $customPrice = $price->custom_price;
                            }
                        }
                        $price = isset($customPrice)?$customPrice:$type->price;
                        $availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00'] = (object)[
                            'time' => ($i<10)?'0'.$i.':00:00':$i.':00:00',
                            'price' => $price
                        ];
                        if($res){
                            if(isset($availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00']->staff)){
                                $availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00']->staff = [$id];
                            } else {
                                $availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00']->staff[] = $id;
                            }
                        }
                    } else {
                        if(isset($availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00']->staff)){
                            $availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00']->staff = [$id];
                        } else {
                            $availableTimes[($i<10)?'0'.$i.':00:00':$i.':00:00']->staff[] = $id;
                        }
                    }
                }
            }
        }
        $temp = $availableTimes;
        $availableTimes = [];
        foreach ($temp as $time){
            $availableTimes[] = $time;
        }
        return $availableTimes;
    }


}
