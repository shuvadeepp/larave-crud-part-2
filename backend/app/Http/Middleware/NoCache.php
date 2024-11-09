<?php

/********************************************
  File Name     : NoCache.php
  Description   : Middleware to manage the header cache control
  Created By    : T Ketaki Debadarshini 
  Created On    : 02-Jun-2018

  ======================================================================
  |Update History                                                      |
  ======================================================================
  |<Updated by>                 |<Updated On> |<Remarks>         
  ----------------------------------------------------------------------
  |Name Goes Here               |23-Jan-2013  |Remark goes here        
  ----------------------------------------------------------------------
  |                             |             |                  
  ----------------------------------------------------------------------

 ********************************************/

namespace App\Http\Middleware;
use Closure;

class NoCache
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        
        if ($request->is('*.js') || $request->is('*.css')){
            $response->header("pragma", "private");
            $response->header("Cache-Control", " private, max-age=86400");
        } else {
           $response->header('Cache-Control','nocache,no-store,max-age=0,must-revalidate')
                        ->header('Pragma','no-cache')
                        ->header('Expires','Sat,01 Jan 1990 00:00:00 GMT');
        }

        return $response;
        
    }
}
