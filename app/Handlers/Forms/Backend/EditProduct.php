<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use App\Support\FormHandler;
use Lavender\Contracts\Form;

class EditProduct extends FormHandler
{

    /**
     * @param $data
     */
    public function handle_product(Form $data)
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
    public function handle_categories(Form $data)
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