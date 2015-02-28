<?php
namespace App\Workflow\Handlers\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class EditProduct
{

    /**
     * @param $data
     */
    public function handle(Workflow $data)
    {
        $request = $data->request;

        $product = $data->product;

        try{

            $product->update($request);

            Message::addSuccess(sprintf(
                "Product %s was updated.",
                $product->name
            ));

        } catch(\Exception $e){

            dd($e->getMessage());

        }
    }

}