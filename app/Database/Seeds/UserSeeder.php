<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @throws \ReflectionException
     */
    public function run()
    {
        $user = new UserModel();
        $user->insertBatch([
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => password_hash("12345678", PASSWORD_BCRYPT),
                'phone' => '9876543211',
                'profile_image' => '',
                'role' => 'admin',
                'status' => 'verified',
            ],
            [
                'name' => 'Editor',
                'email' => 'admin@editor.com',
                'password' => password_hash("12345678", PASSWORD_BCRYPT),
                'phone' => '1234567890',
                'profile_image' => '',
                'role' => 'editor',
                'status' => 'verified',
            ],
        ]);
    }
}
