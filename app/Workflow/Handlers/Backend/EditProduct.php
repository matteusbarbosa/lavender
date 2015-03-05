<?php
namespace App\Workflow\Handlers\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class EditProduct
{

    /**
     * @param $data
     */
    public function handle_product(Workflow $data)
    {
        $request = $data->request;

        $product = $data->product;

        $new = !$product->exists;

        $product->fill($request);

        $product->save();

        Message::addSuccess(sprintf(
            "Product \"%s\" was %s.",
            $product->name,
            $new ? 'created' : 'updated'
        ));
    }

    /**
     * @param $data
     */
    public function handle_categories(Workflow $data)
    {
        $request = $data->request;

        $product = $data->product;

        //todo fix detach / update (doesn't work sequentially without cloning entity)
        $cloned = clone $product;
        $cloned->categories()->detach();

        $product->update(['categories' => ['category' => $request['category']]]);

        Message::addSuccess(sprintf(
            "Product \"%s\" was updated.",
            $product->name
        ));
    }

}