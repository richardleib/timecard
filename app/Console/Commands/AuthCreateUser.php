<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AuthCreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user without going through forms';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username   =   $this->ask('Desired username');
        $email      =   $this->ask('Email address');
        $password   =   $this->secret('Password');

        try {
            $user   =   \App\User::create([
                            'email'     =>  $email,
                            'username'  =>  $username,
                            'password'  =>  \Hash::make($password),
                        ]);
        }
        catch(\Exception $e) {
            \Log::error('Error creating user', [
                'err_msg'   =>  $e->getMessage(),
            ]);
            $this->error($e->getMessage());
            exit;
        }

        $this->line("User was created. Your ID is {$user->id}");
    }
}
