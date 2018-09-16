<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Api\ServiceFacade;

class checkApiKey
{
    public function handle($request, Closure $next)
    {
        $access = false;
        foreach (config('api.apps') as $index => $key){
            if($request->get('apiKey') == $key){
                $access = true;
            }
        }

        if($access === false){
            header("HTTP/1.1 401 Unauthorized");
            $response = (new ServiceFacade());
            $response->data['error'] = 401;
            $response->responseData(null,$request);
        }
        return $next($request);
    }
}