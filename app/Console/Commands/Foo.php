<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class Foo extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'foo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Foo, bar';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('foo');
        $this->error('bar');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}