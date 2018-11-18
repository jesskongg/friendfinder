<?php

use Illuminate\Database\Seeder;

class MeetupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $meetups = [
            [   
                'Fornite LAN Party',
                'We are hosting a gaming event for Fornite.',
                'room ASB 123',
                '2018-12-13',
                1,
            ],[
                'Hotpot party',
                'Bring your own food event.',
                'room ASB 321',
                '2018-12-14',
                2,
            ],[
                'League of Legends LAN Party',
                'This event is for iron division only! It will be hosted.',
                'room ASB 098',
                '2018-12-15',
                3,
            ],[
                'CSSS General Meeting',
                'The next CSSS General Meeting will be happening.',
                'room ASB 232',
                '2018-12-16',
                3,
            ],[
                'Christmas Party',
                'Everyone is welcomed! Food will be provided! Come and take photos with Santa.',
                'room ASB 19223',
                '2018-12-17',
                4,
            ]
        ];

        foreach($meetups as $meetup)
        {
            DB::table('meetups')->insert([
                'title' => $meetup[0],
                'description' => $meetup[1],
                'location' => $meetup[2],
                'date' => $meetup[3],
                'creator_id' => $meetup[4],
            ]);               
        }
    }
}
