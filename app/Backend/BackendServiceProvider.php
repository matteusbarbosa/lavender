<?php
namespace Lavender\Backend;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Lavender\Support\Facades\Message;
use Lavender\Support\Facades\Workflow;

class BackendServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/backend', 'backend', realpath(__DIR__));
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerListeners();

        $this->registerRoutes();

        $this->app->booted(function(){

            $this->createNav();

        });
    }

    private function registerListeners()
    {
        $this->app->events->listen(
            'workflow.entity_manager.edit.after',
            'Lavender\Backend\Handlers\Entity\After'
        );
    }

    private function registerRoutes()
    {
        Route::post('backend/{workflow}/{state}/{entity}/{id}', function ($workflow, $state, $entity, $id){

            if($model = $this->validate($entity, $id)){

                return Workflow::make($workflow, ['entity' => $model])->post($state, Input::all());
            }

        });
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
        \Menu::make('backend')->add('config', [
            'content' => \Html::link('backend/config', 'Manage Config'),
            'children' => [
                ['content' => \Html::link('backend/import', 'Import')],
                ['content' => \Html::link('backend/export', 'Export')],
            ]
        ]);
    }

    protected function addWebsite()
    {
        \Menu::make('backend')->add('website', [
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
        \Menu::make('backend')->add('account', [
            'content' => \Html::link('#','Accounts'),
            'children' => [
                ['content' => \Html::link('backend/entity/customer','Customers')],
                ['content' => \Html::link('backend/entity/admin','Administrators')],

            ]
        ]);
    }


    protected function addCatalog()
    {
        \Menu::make('backend')->add('catalog', [
            'content' => \Html::link('#','Catalog'),
            'children' => [
                ['content' => \Html::link('backend/entity/product','Products')],
                ['content' => \Html::link('backend/entity/category','Categories')],

            ]
        ]);
    }



    /**
     * todo move this functionality (see EntityController::validate())
     * @param $entity
     * @param null $id
     * @return ViewModelInterface
     */
    protected function validate($entity, $id = null)
    {
        if(app()->bound("entity.{$entity}")){

            $model = entity($entity);

            // passing < 1 will allow new entities
            if($id > 0) $model = $model->find($id);

            if($model) {

                return $model;

            } else {

                Message::addError("{$entity} not found in database for id '{$id}'.");

            }

        } else {

            Message::addError("Entity '{$entity}' not found.");

        }
    }

}