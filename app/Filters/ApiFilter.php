<?php

namespace App\Filters;

use Illuminate\Http\Request;


class ApiFilter{

    // Allowed parms from the url
    protected $safeParms=[];

    // transforming fields into db columns
    protected $columnMap=[];
// transforms the operators we are using from the query string into operators that eloquent is going to need
    protected $operatorMap=[];

    // Actual functionality of transforming the request query string into an array that we can pass on to eloguent

    public function transform(Request $request){
        $eloQuery=[]; //array to pass to elequent

        foreach ($this->safeParms as $parm => $operators){
        $query=$request->query($parm);

        if(!isset($query)){
            continue;
        }

        $column=$this->columnMap[$parm] ?? $parm;

        foreach($operators as $operator){
        if(isset($query[$operator])){
            $eloQuery[]=[$column,$this->operatorMap[$operator],$query[$operator]];
        }
        }


    }
    return $eloQuery;

}
}
