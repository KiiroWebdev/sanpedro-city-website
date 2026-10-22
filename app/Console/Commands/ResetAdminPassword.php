<?php
namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

#[Signature('app:reset-admin-password')]
#[Description('Securely reset an administrator password')]
class ResetAdminPassword extends Command
{
    public function handle(): int
    {
        $username = $this->ask('Enter the admin username');

        if (!is_string($username) || trim($username) === '') {
            $this->error('A username is required.');

            return self::FAILURE;
        }

        $admin = Admin::where('username', trim($username))->first();

        if (!$admin) {
            $this->error('No administrator account was found.');

            return self::FAILURE;
        }

        $this->info("Administrator found: {$admin->username}");

        if (!$this->confirm('Do you want to reset this administrator password?', false)) {
            $this->info('Password reset cancelled.');

            return self::SUCCESS;
        }

        $password = $this->secret('Enter the new password');

        if (!is_string($password)) {
            $this->error('A password is required.');

            return self::FAILURE;
        }

        $validator = Validator::make(
            ['password' => $password],
            ['password' => ['required', 'string', Password::min(12)]]
        );

        if ($validator->fails()) {
            $this->error('Password must be at least 12 characters long.');

            return self::FAILURE;
        }

        $confirmation = $this->secret('Confirm the new password');

        if (!is_string($confirmation) || !hash_equals($password, $confirmation)) {
            $this->error('The passwords do not match.');

            return self::FAILURE;
        }

        $admin->password = Hash::make($password);
        $admin->save();

        $this->info('Administrator password reset successfully.');

        return self::SUCCESS;
    }
}
