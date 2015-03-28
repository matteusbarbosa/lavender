<?php
namespace App\Workflow\Forms;

trait Address
{

    public function addAddress($name)
    {
        $this->addField($name.'[name]', [
            'label' => 'Full Name',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField($name.'[street_1]', [
            'label' => 'Street Address',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField($name.'[street_2]', [
            'label' => '',
            'type' => 'text',
        ]);

        $this->addField($name.'[city]', [
            'label' => 'City',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField($name.'[region]', [
            'label' => 'State/Region',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField($name.'[country]', [
            'label' => 'Country',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField($name.'[postcode]', [
            'label' => 'Postcode',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField($name.'[phone]', [
            'label' => 'Phone',
            'type' => 'text',
        ]);
    }

}
