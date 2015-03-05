<?php
namespace App\Workflow\Handlers\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class EditConfig
{

    /**
     * @param $data
     */
    public function handle_general(Workflow $data)
    {
        $this->updateConfig($data->getFields(), $data->request);

        Message::addSuccess('Config updated successfully!');
    }

    /**
     * @param $data
     */
    public function handle_account(Workflow $data)
    {
        $this->updateConfig($data->getFields(), $data->request);

        Message::addSuccess('Config updated successfully!');
    }

    /**
     * Update the store config
     * Save key/value pairs, check if key already exists to update or add new.
     * Also delete any stored fields that are missing from the request.
     *
     * @param $fields array of fields required to be in the request
     * @param $request array of user input
     */
    protected function updateConfig($fields, $request)
    {
        foreach($fields as $field){

            $config = $this->getConfig($field);

            if(isset($request[$field])){

                if($config->exists){

                    // update config if exists
                    $config->value = $request[$field];

                } else{

                    // otherwise add new entry
                    $config->fill(['key' => $field, 'value' => $request[$field]]);

                }

                $config->save();

            } else {

                if($config->exists){

                    // remove if exists but field missing from request
                    $config->delete();

                }

            }

        }
    }

    protected function getConfig($field)
    {
        if(!$config = entity('store_config')->where('key', '=', $field)->first()){

            $config = entity('store_config');

        }

        return $config;
    }

}