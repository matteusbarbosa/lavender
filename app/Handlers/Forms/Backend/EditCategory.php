<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use App\Support\FormHandler;
use Lavender\Contracts\Workflow;

class EditCategory extends FormHandler
{

    /**
     * @param $data
     */
    public function handle_category(Workflow $data)
    {
        $request = $this->request;

        $category = $data->category;

        $new = !$category->exists;

        $parent = reset($request['category']);

        $request['parent'] = ['category' => $parent];

        unset($request['category']);

        $category->fill($request);

        $category->save();

        Message::addSuccess(sprintf(
            "Category \"%s\" was %s.",
            $category->name,
            $new ? 'created' : 'updated'
        ));
    }

}