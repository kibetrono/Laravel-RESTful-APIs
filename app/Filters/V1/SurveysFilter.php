<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

use App\Filters\ApiFilter;

class SurveysFilter extends ApiFilter{

    // Allowed parms from the url
    protected $safeParms=[
            'name'=>['eq'],
            'type'=>['eq'],
            'email'=>['eq'],
            'address'=>['eq'],
            'city'=>['eq'],
            'state'=>['eq'],
            'postalCode'=>['eq','gt','lt'],
    ];

    // transforming fields into db columns
    protected $columnMap=[

        'postalCode'=>'postal_code'
    ];
// transforms the operators we are using from the query string into operators that eloquent is going to need
    protected $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
    ];

    // Actual functionality of transforming the request query string into an array that we can pass on to eloguent


}
