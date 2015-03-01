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

        $category->update($request);

        Message::addSuccess(sprintf(
            "Category \"%s\" was updated.",
            $category->name
        ));
    }

}