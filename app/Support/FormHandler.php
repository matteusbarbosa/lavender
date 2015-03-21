<?php
namespace App\Support;

use Illuminate\Http\Request;
use Lavender\Contracts\Workflow;

abstract class FormHandler
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}