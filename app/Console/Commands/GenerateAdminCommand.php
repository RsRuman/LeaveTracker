<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates admin users';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name     = $this->ask('Enter admin name');
        $email    = $this->ask('Enter admin email');
        $password = $this->secret('Enter admin password');

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),
            'type'     => 'admin',
            'status'   => 'approved'
        ]);

        $this->info('Admin user created!');
    }
}
