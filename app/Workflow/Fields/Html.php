<?php
namespace App\Workflow\Fields;


use Illuminate\Contracts\Support\Arrayable;
use Lavender\Contracts\Entity;

class Html
{

    public function label($text, $options)
    {
        return '<label class="form-label"'.attr($options).'>'.$text.'</label>';
    }

    public function button($text, $options)
    {
        return '<button class="form-button"'.attr($options).'>'.$text.'</button>';
    }

    public function comment($text)
    {
        return '<span class="form-comment">'.$text.'</span>';
    }

    public function error($text)
    {
        return '<span class="form-error">'.$text.'</span>';
    }

    public function tree($selected, $options, $resource, $helper)
    {
        return view('layouts.partials.tree.list', [
            'list' => $this->_tree($selected, $options, $helper($resource), $helper)
        ]);
    }

    protected function _tree($selected, $options, $resource, $helper)
    {
        $html = [];

        foreach($resource as $item){

            $html[] = [
                'content'  => view('layouts.partials.tree.item', [
                    'label'   => $item['label'],
                    'name'    => $item['name'],
                    'value'   => $item['value'],
                    'checked' => in_array($item['value'], $selected),
                ]),
                'children' => $this->_tree($selected, $options, $helper($item), $helper),
            ];

        }

        return $html;
    }

}