<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

use App\Filters\ApiFilter;

class QuestionsFilter extends ApiFilter{

    // Allowed parms from the url
    protected $safeParms=[
        
            'survey_id'=>['eq'],
            'type'=>['eq'],
            'rate'=>['eq'],
            'mytextchoices'=>['eq'],
            'title'=>['eq'],
            'status'=>['eq'],
            'required'=>['eq'],
        
    ];

    // transforming fields into db columns
    protected $columnMap=[

        'postalCode'=>'postal_code',
        'billedDate'=>'billed_date',
        'paidDate'=>'paid_date',
    ];
// transforms the operators we are using from the query string into operators that eloquent is going to need
    protected $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!=',

    ];

}
