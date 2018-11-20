<?php

use Illuminate\Database\Seeder;
use App\Friendship;
use App\User;

class FriendshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testUser = User::find(11); // test user 1
        
        $recipient = User::find(1);
        $testUser->befriend($recipient);
        $recipient->acceptFriendRequest($testUser);
        $recipient = User::find(2);
        $testUser->befriend($recipient);
        $recipient->acceptFriendRequest($testUser);
        $recipient = User::find(3);
        $testUser->befriend($recipient);
        $recipient->acceptFriendRequest($testUser);
        $recipient = User::find(4);
        $testUser->befriend($recipient);
        $recipient->acceptFriendRequest($testUser);

        $recipient = User::find(5);
        $testUser->befriend($recipient);
        $recipient = User::find(6);
        $testUser->befriend($recipient);
        $recipient = User::find(7);
        $testUser->befriend($recipient);
        $recipient = User::find(8);
        $testUser->befriend($recipient);
        
        $sender = User::find(9);
        $sender->befriend($testUser);

        $sender = User::find(10);
        $sender->befriend($testUser);
    }
}
