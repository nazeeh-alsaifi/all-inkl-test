<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Config;
use DB;
use Illuminate\View\View;
use PDO;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function search(Request $request): View|RedirectResponse
    {
        // dd($request->all());
        /**
         * TODO: need to create more validation rules like: 
         *  1. check if mysql host exists, 
         *  2. check ability to connect to host using password and username ,
         *  3. check if schema exists, 
         *  4. parse the mysqlQuery to make sure there is no sql injection
         *  5. need pagination avoid out of memory errors
         */

        // simple validation
        $validated = $request->validate([
            'mysqlHost' => 'required',
            'mysqlDatabase' => 'required',
            'mysqlUsername' => 'required',
            'mysqlPassword' => 'required',
            'mysqlQuery' => 'required',
        ]);

        // dynamic config in runtime based on request data after being validated
        $newConfig = Config::get('database.connections.mysql');
        $newConfig['host'] = $validated['mysqlHost'];
        $newConfig['database'] = $validated['mysqlDatabase'];
        $newConfig['username'] = $validated['mysqlUsername'];
        $newConfig['password'] = $validated['mysqlPassword'];
        Config::set('database.connections.mysql', $newConfig);


        // when request data is correct the connection will be created and can be used to run the validated and parsed query
        try {
            $pdo = DB::getPdo();
            $stmt = $pdo->prepare($validated["mysqlQuery"]);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                // get the columns from the results
                $columns = array_keys($results[0]);

                // get values only without the keys
                $values = array_map(function ($value) {
                    return array_values($value);
                }, $results);
            }

        } catch (\Throwable $th) {
            return back()->withErrors(["Exception" => $th->getMessage()])->withInput();
        }


        return view('welcome')->with(compact('columns', 'values', 'validated'));
    }
}
