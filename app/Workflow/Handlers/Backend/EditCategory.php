<?php
namespace App\Workflow\Handlers\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class EditCategory
{

    /**
     * @param $data
     */
    public function handle(Workflow $data)
    {
        $request = $data->request;

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