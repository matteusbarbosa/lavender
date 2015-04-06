<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Form;

class EditProduct
{

    /**
     * @param $data
     */
    public function handle_product(Form $form)
    {
        $request = $form->request->all();

        $product = $form->product;

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
    public function handle_categories(Form $form)
    {
        $request = $form->request->all();

        $product = $form->product;

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