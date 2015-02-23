<?php
namespace App\Handlers\Layout;

class BaseHandler
{
    /**
     * Base layout applied to all views
     *
     * @param $event
     */
    public function handle($event)
    {
        $this->baseLayouts();
    }

    protected function baseLayouts()
    {
        view()->composer('page.section.head', function($view){

            append_section('head.anchor', ['config' => 'store.name']);

            append_section('head.style', ['style' => 'css/app.css']);

            append_section('head.script', ['script' => 'js/app.js']);

            append_section('head.meta', ['meta' => ['name' => 'robots', 'content' => 'noindex, nofollow']]);

        });

        view()->composer('page.section.footer', function($view){

            append_section('footer.bottom.before', ['layout' => 'page.section.footer.copyright']);

        });
    }
}