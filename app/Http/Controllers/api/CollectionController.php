<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Functions\ApiFacade;
use Illuminate\Http\Request;
use Models\Codes;
use Models\Company;
use Models\Coupons;


class CollectionController extends Controller
{

    private $service;

    public function __construct(){
        $this->service = (new ServiceFacade);
    }


    public function getCompanies(Request $request){
        $data = (new Company)->joinLanguage()->where('visible', 1)->get();
        $this->service->responseData(['data' => $data], $request);
    }

    public function getCoupons(Request $request){
        $data = (new Coupons)->joinlanguage();
        if($request->has('company_id'))
            $data = $data->where('company_id', $request->get('company_id'));
        $data = $data->get();
        $this->service->responseData(['data' => $data], $request);
    }

    public function OrderCode(Request $request){
        $code = (new Codes)->where('coupon_id', $request->get('coupon_id'))->where('status', 0)->first();

        if(!$code)
            $this->service->responseData(['error' => '1001'], $request);

        $company = (new Company)->joinLanguage()->where('id', $code->company_id)->first();
        if(!$company)
            $this->service->responseData(['error' => '1001'], $request);
        $coupon = (new Coupons)->joinLanguage()->where('id', $code->coupon_id)->first();

        $this->service->payWithBOG([
            'from' => $request->get('user_account'),
            'to' => $company->account,
            'price' => $coupon->price,
            'companyName' => $company->title,
            'username' => $request->get('username')
        ]);

        (new Codes)->where('code', $code->code)->update(['status' => 1, 'updated_at' => date('Y-m-d H:i:s')]);

        $this->service->responseData(['data' => ['url' => 'http://bog.devmobility.com/coupon/'.$code->code]], $request);

    }




}
