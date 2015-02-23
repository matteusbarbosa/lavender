<?php
namespace App\Handlers\Events\Layout;

class BackendHandler
{
    /**
     * Base layout applied to all views
     *
     * @param $event
     */
    public function handle($event)
    {
        $this->backendLinks();

        $this->backendNavigation();

        $this->backendLayouts();
    }

    protected function backendNavigation()
    {
        $backend_navigation = menu('backend.navigation');

        $backend_navigation->add('home', [
            'href' => 'backend',
            'text' => 'Dashboard',
        ]);

        $backend_navigation->add('catalog', [
            'href' => 'backend/catalog',
            'text' => 'Catalog',
            'children' => [
                [
                    'href' => 'backend/product',
                    'text' => 'Products'
                ],
                [
                    'href' => 'backend/category',
                    'text' => 'Categories'
                ],
            ]
        ]);

        $backend_navigation->add('sales', [
            'href' => 'backend/sales',
            'text' => 'Sales',
            'children' => [
                [
                    'href' => 'backend/sales/orders',
                    'text' => 'Orders',
                ],
                [
                    'href' => 'backend/sales/reports',
                    'text' => 'Reports',
                ],
            ]
        ]);

        $backend_navigation->add('account', [
            'href' => 'backend/account',
            'text' => 'Accounts',
            'children' => [
                [
                    'href' => 'backend/customer',
                    'text' => 'Customers',
                ],
                [
                    'href' => 'backend/admin',
                    'text' => 'Administrators',
                ],
            ]
        ]);

        $backend_navigation->add('website', [
            'href' => 'backend/website',
            'text' => 'Website',
            'children' => [
                [
                    'href' => 'backend/store',
                    'text' => 'Stores',
                ],
                [
                    'href' => 'backend/theme',
                    'text' => 'Themes',
                ],
                [
                    'href' => 'backend/config',
                    'text' => 'Config',
                    'children' => [
                        [
                            'href' => 'backend/config/import',
                            'text' => 'Import',
                        ],
                        [
                            'href' => 'backend/config/export',
                            'text' => 'Export',
                        ],
                    ]
                ]
            ]
        ]);
    }

    protected function backendLinks()
    {
        $backend_links = menu('backend.links');

        $backend_links->add('frontend', [
            'href' => '/',
            'text' => 'Go to frontend',
        ]);
    }

    protected function backendLayouts()
    {
        view()->composer('page.section.head', function($view){

            append_section('head.style', ['style' => 'css/jquery.dataTables.min.css']);

            append_section('head.script', ['script' => 'js/jquery-2.1.3.min.js']);

            append_section('head.script', ['script' => 'js/jquery.dataTables.min.js']);

        });

        view()->composer('page.section.header.logo', function($view){

            $view->with('url', url('backend'));

        });

        view()->composer('page.section.header', function($view){

            append_section('header.top.links', ['menu' => 'backend.links']);

            append_section('header.top.navigation', ['menu' => 'backend.navigation']);

        });
    }

}