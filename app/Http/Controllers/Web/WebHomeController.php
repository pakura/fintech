<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Models\Codes;
use Models\Company;
use Models\Coupons;

class WebHomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.home');
    }


    public function coupon($coupon){
        $data['coupon'] =  $coupon;
        $data['code'] = (new Codes)->where('code', $coupon)->first();
        $data['company'] = (new Company)->joinLanguage()->where('id', $data['code']->company_id)->first();
        $data['coupons'] = (new Coupons)->joinLanguage()->where('id', $data['code']->coupon_id)->first();
        return view('web.text', $data);
    }
}
