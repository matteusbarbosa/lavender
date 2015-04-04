<?php
namespace App\Support;

use Illuminate\Http\Request;

abstract class FormHandler
{
    public function __construct(Request $request)
    {
        //todo construct with FORM request
        $this->request = $request;
    }
}