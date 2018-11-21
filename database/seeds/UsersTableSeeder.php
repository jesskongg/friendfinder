<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // These are done using https://quotesondesign.com/api-v4-0/
        // and https://randomuser.me/ APIs using a python script
        // We could make the script work here using PHP but I want to have a fixed
        // data set so that it will always work.
        
        // https://github.com/lijason103/UserBioGenerator

        // TODO: move this into a JSON file
        $users = [
            [
                "Isa Werth",
                "isawerth@gmail.com",
                "Standards are like toothbrushes, everybody agrees you should have one, but no one wants to use yours.",
                [64,66,112,26,106,108,35,],
            ],
            [
                "Berk Mesman",
                "berkmesman@gmail.com",
                "If you want to set off and go develop some grand new thing, you dont need millions of dollars of capitalization. You need enough pizza and Diet Coke to stick in your refrigerator, a cheap PC to work on and the dedication to go through with it.",
                [74,129,134,135,104,25,44,58,],
            ],
            [
                "Manuela Velasco",
                "manuelavelasco@gmail.com",
                "Sometimes you can draw more inspiration from the people who dont believe in you, then from the ones who do",
                [12,35,],
            ],
            [
                "Henryk Hipp",
                "henrykhipp@gmail.com",
                "Only show work you like, or youll end up being hired to do things you dont lik",
                [32,79,76,15,15,26,],
            ],
            [
                "Alvarim Monteiro",
                "alvarimmonteiro@gmail.com",
                "I love designing, it is something which permeates my whole living, whether it is simply choosing the colour of my clothes in the morning or organising my household. Design to me is akin to beauty, an externalisation of my inner process regarding beauty  contentment with life.",
                [73,81,40,8,58,],
            ],
            [
                "Derviş Diemel",
                "dervişdiemel@gmail.com",
                "The pushy bird gets the worm.",
                [2,90,8,30,58,116,106,],
            ],
            [
                "Miúcha Souza",
                "miúchasouza@gmail.com",
                "They enjoy giving form to ideas. If designers were made of ideas, theyd be their own client",
                [53,65,],
            ],
            [
                "Luca Bertrand",
                "lucabertrand@gmail.com",
                "Design is directed toward human beings. To design is to solve human problems by identifying them and executing the best solution.",
                [54,33,53,],
            ],
            [
                "Katherine Ray",
                "katherineray@gmail.com",
                "The large print giveth and the small print taketh away. ",
                [92,122,15,84,54,107,110,],
            ],
            [
                "Alpoim Barros",
                "alpoimbarros@gmail.com",
                "As a profession, graphic designers have been shamefully remiss or ineffective about plying their craft for social or political betterment.",
                [81,28,97,123,],
            ],
            [
                "Adónias Carvalho",
                "adóniascarvalho@gmail.com",
                "Having a style is like being in jai",
                [85,105,],
            ],
            [
                "Sharifa Santegoets",
                "sharifasantegoets@gmail.com",
                "In a well-made book, where designer, compositor and printer have all done their jobs, no matter how many thousands of lines and pages they must occupy, the letters are alive. They dance in their seats. Sometimes they rise and dance in the margins and aisles.",
                [73,117,],
            ],
            [
                "Lucie Legrand",
                "lucielegrand@gmail.com",
                "The secret of success is doing something you love, doing it well and being recognized for it.",
                [97,101,9,91,],
            ],
            [
                "Madison Edwards",
                "madisonedwards@gmail.com",
                "Dont mistake legibility for communication.",
                [36,62,6,66,90,92,83,129,],
            ],
            [
                "Lawrence Webb",
                "lawrencewebb@gmail.com",
                "You can use an eraser on the drafting table or a sledge hammer on the construction site.",
                [108,41,79,25,68,],
            ],
            [
                "Steven Tucker",
                "steventucker@gmail.com",
                "Design is more about the process than it is about the resulting prettines",
                [44,38,132,92,],
            ],
            [
                "Iker Reyes",
                "ikerreyes@gmail.com",
                "Calvin: You cant just turn on creativity like a faucet. You have to be in the right mood.Hobbes: What mood is that?Calvin: Last-minute panic.",
                [78,40,121,83,111,],
            ],
            [
                "Fabiènne Schram",
                "fabiènneschram@gmail.com",
                "The next time you’re caught in a room full of smart people doing something dumb (like trying to anticipate what your users will do), tune them out, flip open your laptop, and start prototypin",
                [6,84,31,87,92,38,],
            ],
            [
                "Milia Fonn",
                "miliafonn@gmail.com",
                "Design is a formal response to a strategic question.",
                [24,104,100,],
            ],
            [
                "Josh Shaw",
                "joshshaw@gmail.com",
                "Good design is a lot like clear thinking made visua",
                [42,46,134,45,116,93,],
            ],
            [
                "Natascha Nikolaus",
                "nataschanikolaus@gmail.com",
                "If you see a few lines of atrocious code, you can make a judgement about the programmer. By judging the programmer, you can judge his boss, and by judging his boss you can judge the company. Thats the nature of fractals.",
                [120,31,99,],
            ],
            [
                "Josefine Behn",
                "josefinebehn@gmail.com",
                "Its not the papers fault that so much shit is printed.",
                [38,5,79,108,93,21,46,31,],
            ],
            [
                "Brooke Hoffman",
                "brookehoffman@gmail.com",
                "Creativity is a drug I cannot live withou",
                [121,7,110,90,],
            ],
            [
                "Warren Rhodes",
                "warrenrhodes@gmail.com",
                "Rules can be broken  but never ignored.",
                [14,35,3,34,118,64,131,],
            ],
            [
                "Shawn Harvey",
                "shawnharvey@gmail.com",
                "Design is how you treat your customers. If you treat them well from an environmental, emotional, and aesthetic standpoint, youre probably doing good design.",
                [45,130,99,21,25,5,108,64,],
            ],
            [
                "Celestine Caron",
                "celestinecaron@gmail.com",
                "Designing with watermarked photos is like baking with fake suga",
                [29,62,],
            ],
            [
                "Josine Mimpen",
                "josinemimpen@gmail.com",
                "If youre more susceptible to interruption, you do more out of the box thinking.",
                [34,126,70,91,98,39,84,47,],
            ],
            [
                "Eva Baker",
                "evabaker@gmail.com",
                "Design is the fundamental soul of a human-made creation that ends up expressing itself in successive outer layers of the product or service.",
                [33,34,29,31,],
            ],
            [
                "Zeni Santos",
                "zenisantos@gmail.com",
                "Drawing is speaking to the eye; talking is painting to the ea",
                [40,59,109,],
            ],
            [
                "Lena Lemoine",
                "lenalemoine@gmail.com",
                "The medium is the messag",
                [64,31,24,83,115,12,47,],
            ],
            [
                "Frederikke Kristensen",
                "frederikkekristensen@gmail.com",
                "We cant just design an item that looks great. We also have to anticipate how it is boxed up, distributed, and shipped, as well as whether or not a seventeen-year-old kid with a summer job can stock it on the store shelf without ruining it.",
                [55,33,57,31,65,101,84,101,],
            ],
            [
                "Toivo Toro",
                "toivotoro@gmail.com",
                "When we think of design, we usually imagine things that are chosen because they are designed. Vases or comic books or architectureIt turns out, though, that most of what we make or design is actually aimed at a public that is there for something else. The design is important, but the design is not the point. Call it public designPublic design is for individuals who have to fill out our tax form, interact with our website or check into our hotel room despite the way its designed, not because of i",
                [59,50,27,33,],
            ],
            [
                "Phoebe Hudson",
                "phoebehudson@gmail.com",
                "The simplest way to achieve simplicity is through thoughtful reduction.",
                [133,100,12,79,79,62,18,128,],
            ],
            [
                "Eugene Lynch",
                "eugenelynch@gmail.com",
                "The word studio is derives from study. Our object is not to know the answers before we do the work. Its to know them after we do it.",
                [11,87,109,35,56,4,],
            ],
            [
                "Sara Puro",
                "sarapuro@gmail.com",
                "I found I could say things with color and shapes that I couldnt say any other way  things I had no words fo",
                [77,113,24,],
            ],
            [
                "Charles Blanchard",
                "charlesblanchard@gmail.com",
                "If all else fails, [working harder than anyone else] is the greatest competitive advantage of any caree",
                [63,71,9,129,85,44,50,],
            ],
            [
                "Özsu Alyanak",
                "özsualyanak@gmail.com",
                "What we got here is failure to communicate.",
                [8,129,47,92,82,128,33,109,],
            ],
            [
                "Charles Watson",
                "charleswatson@gmail.com",
                "I really like looking at design and thinking: that attention to detail must have taken absolutely age",
                [66,28,53,39,88,121,118,24,],
            ],
            [
                "Jessica Martin",
                "jessicamartin@gmail.com",
                "You can observe a lot just by watching. ",
                [12,136,120,53,120,50,105,101,],
            ],
            [
                "Cohen Clarke",
                "cohenclarke@gmail.com",
                "You can observe a lot just by watching. ",
                [113,9,19,8,107,58,112,38,],
            ],
            [
                "Eleni Husemann",
                "elenihusemann@gmail.com",
                "Do you think advertisement can sell if nobody can read it? You cannot save souls in an empty church.",
                [27,16,90,4,43,88,87,],
            ],
            [
                "Christian Graham",
                "christiangraham@gmail.com",
                "Design in art, is a recognition of the relation between various things, various elements in the creative flux. You cant invent a design. You recognize it, in the fourth dimension. That is, with your blood and your bones, as well as with your eyes.",
                [95,49,125,138,117,136,79,],
            ],
            [
                "Rose Lefebvre",
                "roselefebvre@gmail.com",
                "Designers have a dual duty; contractually to their clients and morally to the later users and recipients of their work.",
                [24,58,90,116,65,43,34,32,],
            ],
            [
                "Madelinde De bonte",
                "madelindede bonte@gmail.com",
                "Designers dont actually solve problems. They work through them.",
                [60,86,137,126,90,112,33,21,],
            ],
            [
                "Sergio Sanchez",
                "sergiosanchez@gmail.com",
                "Good design begins with honesty, asks tough questions, comes from collaboration and from trusting your intuitio",
                [44,135,136,84,26,28,102,10,],
            ],
            [
                "Valtteri Halla",
                "valtterihalla@gmail.com",
                "The grid is like the lines on a football field. You can play a great game in the grid or a lousy game. But the goal is to play a really fine gam",
                [64,83,7,78,52,69,2,48,],
            ],
            [
                "Lumi Hanninen",
                "lumihanninen@gmail.com",
                "High degrees of specialization may be rendering us unable to see the connections between the things we design and their consequences as they ripple out into the biosphere.",
                [60,130,114,28,101,97,93,3,],
            ],
            [
                "Marilou Brar",
                "mariloubrar@gmail.com",
                "Just because something looks good doesnt mean its useful. And just because something is useful does not make it beautiful.",
                [29,75,65,32,127,29,56,],
            ],
            [
                "Maxence Fleury",
                "maxencefleury@gmail.com",
                "Copywriting is definitely the profession most written abou",
                [41,125,31,108,87,23,126,58,],
            ],
            [
                "Meral Taşçı",
                "meraltaşçı@gmail.com",
                "You dont have to be a creative to be creativ",
                [85,56,6,57,95,41,134,8,],
            ],
            [
                "Akseli Wiitala",
                "akseliwiitala@gmail.com",
                "Design to communicate, not just decorat",
                [67,107,8,67,13,62,56,],
            ],
            [
                "Mírcia Silveira",
                "mírciasilveira@gmail.com",
                "Propaganda supersedes fact, truth and common sense in all cases.",
                [47,25,87,128,55,104,100,],
            ],
            [
                "Brian Hale",
                "brianhale@gmail.com",
                "There is only one type of designer — the type that cares about typ",
                [120,48,130,110,88,83,86,56,],
            ],
            [
                "Amanda Hanninen",
                "amandahanninen@gmail.com",
                "If a design can be refined, without disturbing its image, it seems reasonable to do so. A logo, after all, is an instrument of pride and should be shown at its bes",
                [60,14,66,137,70,68,129,15,],
            ],
            [
                "Abigail Morin",
                "abigailmorin@gmail.com",
                "I became a graphic artist because of the tools. I love working at a big drawing table with traditional tools: T-squares, compasses, mechanical pencils, French curves, blank ink, and graphite. At a computer, one works on a keyboard. I never considered myself a typist.",
                [10,5,92,97,128,16,125,79,],
            ],
            [
                "Sophia Dupuis",
                "sophiadupuis@gmail.com",
                "Color is a creative element, not a trimming.",
                [1,18,137,28,138,24,64,],
            ],
            [
                "Jasmine Campbell",
                "jasminecampbell@gmail.com",
                "I think advertising is a brilliant concept that has been pooped upon by selfish marketers, resulting in corrupted motives and flawed execution.",
                [136,25,78,134,94,21,92,],
            ],
            [
                "Lino Ribeiro",
                "linoribeiro@gmail.com",
                "The function of design is letting design function.",
                [126,7,112,14,25,115,10,11,],
            ],
            [
                "Heather Perry",
                "heatherperry@gmail.com",
                "A man who stops advertising to save money is like a man who stops a clock to save time.",
                [133,95,90,122,14,99,62,],
            ],
            [
                "Daniel Patel",
                "danielpatel@gmail.com",
                "Bad design is smoke, while good design is a mirror.",
                [31,4,41,34,85,46,110,],
            ],
            [
                "Laurie Chow",
                "lauriechow@gmail.com",
                "Typography has one plain duty before it and that is to convey information in writing. No argument or consideration can absolve typography from this duty.",
                [13,13,132,29,19,19,76,13,],
            ],
            [
                "Anneli Haugsdal",
                "annelihaugsdal@gmail.com",
                "The aim of art is to represent not the outward appearance of things, but their inward significance. ",
                [103,131,65,49,63,50,75,134,],
            ],
            [
                "Erwan Lucas",
                "erwanlucas@gmail.com",
                "Create your own visual style let it be unique for yourself and yet identifiable for others.",
                [51,28,100,106,30,138,55,127,],
            ],
            [
                "Faizel Heslinga",
                "faizelheslinga@gmail.com",
                "Let your watchword be order and your beacon beauty.",
                [78,84,36,19,128,97,38,18,],
            ],
            [
                "Bianca Løvseth",
                "biancaløvseth@gmail.com",
                "Good design at the front-end suggests that everything is in order at the back-end, whether or not that is the case.",
                [17,39,97,101,6,105,114,],
            ],
            [
                "Bently Kowalski",
                "bentlykowalski@gmail.com",
                "Designers dont actually solve problems. They work through them.",
                [97,91,50,75,23,53,2,],
            ],
            [
                "Antelmo Silva",
                "antelmosilva@gmail.com",
                "A designer who gives her art away, makes no pay. A designer who keeps her art to herself, makes no friends. ",
                [20,10,68,53,54,6,51,8,],
            ],
            [
                "Danielle Jenkins",
                "daniellejenkins@gmail.com",
                "More designers should share space, share resources. Sort of an upscale communism.",
                [84,82,109,17,28,95,120,],
            ],
            [
                "Bessie Garcia",
                "bessiegarcia@gmail.com",
                "I recently saw another demonstration of graphic designs ubiquity. Someone had taken a series of photographs of busy streets and then painstakingly removed all the logos, symbols, signs, colours, street names and road markings. In other words, they had removed all the graphic design from these photographs. The results were staggering. A world without graphic design is an unrecognizable world — more alien than all but the most extreme sci-fi imagining",
                [129,65,119,47,15,14,9,],
            ],
            [
                "Flora Roux",
                "floraroux@gmail.com",
                "Good design is obvious. Great design is transparent.",
                [89,69,39,69,126,94,55,],
            ],
            [
                "Alaídes Rezende",
                "alaídesrezende@gmail.com",
                "We are all designers, the difference is that only a few of us do it full-tim",
                [32,1,69,90,37,60,1,],
            ],
            [
                "Ivan Staff",
                "ivanstaff@gmail.com",
                "As long as there are people, there will be user experience, and user interface designer",
                [91,130,92,119,53,30,94,],
            ],
            [
                "Hella Bell",
                "hellabell@gmail.com",
                "Its not about what you make, its about what you make them fee",
                [109,127,84,86,114,120,12,54,],
            ],
        ];

        $oldusers = [
            [
                'Tom',
                'tom@gmail.com',
                'hello',
                [],
            ],
            [
                'Lucy',
                'lucy@gmail.com',
                'what up',
                [2, 3, 4, 15],
            ],
            [
                'Brad',
                'brad@gmail.com',
                'heyooo',
                [2, 3, 4, 16],
            ],
            [
                'Luanne',
                'luanne@gmail.com',
                'bird up',
                [2, 4, 5, 17],
            ],
            [
                'Michael',
                'michael@gmail.com',
                'you hittin the quad later?',
                [2, 4, 5, 18],
            ],
            [
                'Daphne',
                'daphne@gmail.com',
                'hit this ranch with me man',
                [2, 4, 5, 19],
            ],
            [
                'Tom',
                'tom1@gmail.com',
                'good day',
                [2, 4, 6, 20]
            ],
            [
                'Hank',
                'tom2@gmail.com',
                'i need friends',
                [2, 5, 7, 21]
            ],
            [
                'Solomon',
                'brad1@gmail.com',
                'array starts at -1',
                [2, 5, 8, 22]
            ],
            [
                'Mary',
                'lucky1@gmail.com',
                'lucy version 2',
                [2, 6, 9, 23]
            ]
        ];

        $this->addUsers($oldusers);
        $this->addUsers($users);

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
            'bio' => "test account",
        ]);

        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@test.com',
            'password' => bcrypt('test2'),
            'bio' => "test account number 2",
        ]);

    }

    private function addUsers($users) {
        for ($i = 0; $i < count($users); ++$i) {
            $user = $users[$i];
            $name = $user[0];
            $email = $user[1];
            $bio = $user[2];
            $enrollment = $user[3];
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('secret'),
                'bio' => $bio,
            ]);
            for ($j = 0; $j < count($enrollment); ++$j) {
                DB::table('enrollments')->insert([
                    'user_id' => $i,
                    'course_id' => $enrollment[$j],
                ]);
            }
        }
    }
}
