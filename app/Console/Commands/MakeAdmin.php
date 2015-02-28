<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin account';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $success = false;

        while(!$success){

            $admin = entity('admin');

            $admin->email = $this->ask('Enter an email address: (required)');

            $admin->password = $this->secret('Enter a password: (required)');

            $admin->password_confirmation = $this->secret('Confirm your password: (required)');

            $success = $admin->save();

            if(!$success) $this->error($admin->errors);

        }
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