<?php

namespace App\Console\Commands\DB;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'make:db-create-user
                            {--email=admin@example.loc : User email}
                            {--password=123456789 : User password}
                            {--admin=admin : Role (admin or user)}';

    /**
     * The console command description.
     */
    protected $description = 'Create or update a user with email priority from parameters';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->line("<fg=white;bg=cyan;options=bold>  USER MANAGEMENT PROTOCOL  </>");

        // 1. Collect data from script parameters (they take priority)
        $scriptEmail = $this->option('email');
        $plainPassword = $this->option('password');
        $adminType = $this->option('admin');

        $status = ($adminType === 'user') ? 1 : 0;
        $roleTitle = ($adminType === 'user') ? 'user' : 'administrator';

        // Generate auxiliary data
        $username = strstr($scriptEmail, '@', true) ?: $adminType;
        $firstName = "First " . $username;
        $lastName = "Last " . $username;
        $dob = Carbon::now()->subYears(20)->format('Y-m-d');

        $this->info("Searching for user in database...");

        // 2. Search for user by email OR by username
        $user = User::where('email', $scriptEmail)
            ->orWhere('username', $username)
            ->first();

        if ($user) {
            // EMAIL PRIORITY CHECK
            if ($user->email !== $scriptEmail) {
                $this->warn("ATTENTION: User found with username [{$username}], but different email [{$user->email}].");
                $this->warn("The email will be overwritten with the priority one: [{$scriptEmail}].");
            } else {
                $this->info("Existing user found:");
                $this->line("<fg=yellow;options=bold>ID:</>             {$user->id}");
                $this->line("<fg=yellow;options=bold>Username:</>       {$username}");
                $this->line("<fg=yellow;options=bold>Email:</>          {$scriptEmail}");

            }

            if (!$this->confirm('Update this user and apply priority email?', true)) {
                $this->error('Operation cancelled.');
                return;
            }

            $statusMessage = "User data (including email) has been updated.";
        } else {
            $this->comment("User not found.");
            if (!$this->confirm("Create a new user [{$scriptEmail}]?", true)) {
                $this->error('Operation cancelled.');
                return;
            }
            $statusMessage = "New user has been created.";
        }

        // 3. Persistence
        $hashedPassword = Hash::make($plainPassword);

        try {
            // Search by username to update existing user with the new email,
            // or create a new one if neither exists.
            $targetUser = User::updateOrCreate(
                ['username' => $username],
                [
                    'email'      => $scriptEmail,
                    'name'       => $adminType,
                    'first_name' => $firstName,
                    'last_name'  => $lastName,
                    'password'   => $hashedPassword,
                    'status'     => $status,
                    'dob'        => $dob,
                ]
            );

            // 4. Detailed Report
            $this->newLine();
            $this->line("<fg=white;bg=cyan;options=bold>  CREATE USER RESULT  </>");
            $this->line("<fg=green>--------------------------------------------------</>");

            $this->line("<fg=yellow;options=bold>Email:</>           {$scriptEmail} <fg=green>(priority)</>");
            $this->line("<fg=yellow;options=bold>Username:</>        {$username}");
            $this->line("<fg=yellow;options=bold>First Name:</>      {$firstName}");
            $this->line("<fg=yellow;options=bold>Last Name:</>       {$lastName}");
            $this->line("<fg=yellow;options=bold>Date of birthday (-20y):</>      {$dob}");
            $this->line("<fg=yellow;options=bold>Password:</>        {$plainPassword}");

            $color = ($adminType === 'user') ? 'green' : 'blue';
            $this->line("<fg=yellow;options=bold>Role:</>            <fg={$color}>{$roleTitle} (status: {$status})</>");

            $this->line("<fg=green>--------------------------------------------------</>");
            $this->info("STATUS: {$statusMessage}");
            $this->newLine();

        } catch (\Exception $e) {
            $this->error("SQL ERROR: " . $e->getMessage());
        }
    }
}
