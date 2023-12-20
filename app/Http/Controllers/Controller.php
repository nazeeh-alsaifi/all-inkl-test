<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function search(Request $request): array
    {
        $validated = $request->validate([
            'mysqlHost' => 'required',
            'mysqlDatabase' => 'required',
            'mysqlUsername' => 'required',
            'mysqlPassword' => 'required',
            'mysqlQuery' => 'required',
        ]);

        dd($request->all());
        return [];
    }
}
