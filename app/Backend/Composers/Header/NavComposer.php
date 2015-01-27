<?php
namespace Lavender\Backend\Composers\Header;

class NavComposer
{

    public function compose($view)
    {
        $this->createNav();

        $view->with('navigation', \Menu::backend());
    }


    protected function createNav()
    {
        $this->addCatalog();

        $this->addAccount();

        $this->addWebsite();

        $this->addConfig();
    }

    protected function addConfig()
    {
        \Menu::backend()->add('config', [
            'content' => \Html::link('backend/config', 'Manage Config'),
            'children' => [
                ['content' => \Html::link('backend/import', 'Import')],
                ['content' => \Html::link('backend/export', 'Export')],
            ]
        ]);
    }

    protected function addWebsite()
    {
        \Menu::backend()->add('website', [
            'content' => \Html::link('#','Website'),
            'children' => [
                ['content' => \Html::link('backend/entity/store','Stores')],
                ['content' => \Html::link('backend/entity/department','Departments')],
                ['content' => \Html::link('backend/entity/theme','Themes')],

            ]
        ]);
    }

    protected function addAccount()
    {
        \Menu::backend()->add('account', [
            'content' => \Html::link('#','Accounts'),
            'children' => [
                ['content' => \Html::link('backend/entity/customer','Customers')],
                ['content' => \Html::link('backend/entity/admin','Administrators')],

            ]
        ]);
    }


    protected function addCatalog()
    {
        \Menu::backend()->add('catalog', [
            'content' => \Html::link('#','Catalog'),
            'children' => [
                ['content' => \Html::link('backend/entity/product','Products')],
                ['content' => \Html::link('backend/entity/category','Categories')],

            ]
        ]);
    }


}