<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\InvitationCode;
use App\Services\InvitationCodeGenerator;
use Illuminate\Database\Seeder;

class InvitationCodeSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        $generator = new InvitationCodeGenerator();

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                InvitationCode::create([
                    'code' => $generator->generate(),
                    'user_id' => $user->id,
                    'is_used' => false,
                ]);
            }
        }
    }
}
