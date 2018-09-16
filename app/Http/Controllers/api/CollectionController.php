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
        $data = (new Coupons)->where('company_id', $request->get('company_id'))->joinlanguage()->get();
        $code = (new Codes);
        foreach ($data as $coupon){
            $coupon->codes = $code->where('coupon_id', $coupon->coupons_id)->where('status', 1)->get();
        }
        $this->service->responseData(['data' => $data], $request);

    }

    public function OrderCode(Request $request){
        (new Codes)->where('code', $request->get('code'))->update(['status' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
        $this->service->responseData(['data' => 'Geixare ojaxshi'], $request);

    }

}
