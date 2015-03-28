<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use App\Support\FormHandler;
use Lavender\Contracts\Workflow;

class EditProduct extends FormHandler
{

    /**
     * @param $data
     */
    public function handle_product(Workflow $data)
    {
        $request = $this->request->all();

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
        $request = $this->request->all();

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