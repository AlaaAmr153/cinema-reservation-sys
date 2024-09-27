<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Bagman',
            'poster' => 'public/images/moviesposter/Bagman.jpg',
            'duration' => '1 hour and 32 minutes',
            'release_date' => 'September 27, 2024',
            'director' => 'Colm McCarthy',
            'cast' => 'Sam Claflin, Antonia Thomas, and Caréll Rhoden',
            'description' => 'Bagman is a dark horror film about a family trapped in a nightmare as
            they are hunted by the Bagman, a mythical creature feared for snatching children. The film
            follows Patrick McKee, who narrowly escaped the Bagman as a child but now faces the terror
            again with his wife and son.the movie explores the return of this childhood tormentor as it threatens his family.',
            'trailer_url' => 'https://www.youtube.com/watch?v=slrzCgYIUPM',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Damsel',
            'poster' => 'public/images/moviesposter/damsel.jpg',
            'duration' => '1 hour 48 minutes',
            'release_date' => 'March 8, 2024',
            'director' => 'Juan Carlos Fresnadillo',
            'cast' => 'Millie Bobby Brown as Princess Elodie,
                    Angela Bassett as Lady Bayford (stepmother),
                    Robin Wright as Queen Isabelle,
                    Nick Robinson,
                    Ray Winstone as The King,
                    Brooke Carter,
                    Shohreh Aghdashloo',
            'description' => 'Princess Elodie, portrayed by Millie Bobby Brown,
            initially dreams of a fairytale wedding with the charming Prince Henry.
            However, her dream turns into a nightmare when she discovers that her marriage was
            a ploy by the royal family to sacrifice her to a dragon as repayment for an ancient debt.
            Stranded in a dragon’s lair, Elodie must use her wits and willpower to survive',
            'trailer_url' => 'https://youtu.be/iM150ZWovZM',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Deadpool & Wolverine',
            'poster' => 'public/images/moviesposter/Deadpool & Wolverine.jpg',
            'duration' => '2 hours 7 minutes',
            'release_date' => 'July 26, 2024',
            'director' => 'Shawn Levy',
            'cast' => 'Ryan Reynolds as Wade Wilson/Deadpool
            Emma Corrin as Cassandra Nova (villain),
            Hugh Jackman as Wolverine,
            Matthew Macfadyen as Paradox (TVA agent),
            Brianna Hildebrand as Negasonic Teenage Warhead,
            Morena Baccarin as Vanessa,
            Channing Tatum as Gambit,
            Chris Evans as Johnny Storm (cameo),
            Henry Cavill as Wolverine (variant)',
            'description' => 'In this MCU-adjacent adventure, Deadpool recruits Wolverine to help save his collapsing timeline.
            The story dives into the multiverse, with plenty of humor, fights, and surprising team-ups. Cassandra Nova, played by Emma Corrin,
            emerges as a formidable villain, while the duo of Deadpool and Wolverine navigate timeline-hopping, trying to prevent Paradoxs scheme to quicken the destruction of their world',
            'trailer_url' => 'https://youtu.be/73_1biulkYk',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Despicable Me4',
            'poster' => 'public/images/moviesposter/despicable me4.jpg',
            'duration' => '1 hour and 34 minutes',
            'release_date' => 'July 2024',
            'director' => 'Chris Renaud',
            'cast' => 'Steve Carell (Gru), Kristen Wiig (Lucy Wilde), Will Ferrell (Maxime Le Mal), Pierre Coffin (Minions), Joey King (Poppy Prescott), Miranda Cosgrove (Margo), and Sofia Vergara (Valentina)',
            'description' => 'Gru and his family are back in action as they take on Maxime Le Mal,
            a new supervillain voiced by Will Ferrell. Alongside his mischievous Minions,
            Gru and his wife Lucy (Kristen Wiig) must protect their family, including their
            newest member, Gru Jr., who causes his own fair share of chaos. Expect a mix of high-stakes action,
            comedy, and heartwarming moments as Gru balances family life with his Anti-Villain League duties​',
            'trailer_url' => 'https://youtu.be/uAjOOnHUGFM',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Evil Dead Rise',
            'poster' => 'public/images/moviesposter/Evil Dead Rise.jpg',
            'duration' => '96 minutes',
            'release_date' => 'April 21, 2023',
            'director' => 'ee Cronin',
            'cast' => 'Lily Sullivan as Beth,
                        Alyssa Sutherland as Ellie,
                        Gabrielle Echols as Bridget,
                        Morgan Davies as Danny,
                        Nell Fisher as Kassie',
            'description' => 'Evil Dead Rise (2023) is the fifth installment in the Evil Dead horror franchise.
            Directed by Lee Cronin, the film moves the series out of the iconic cabin setting and into a claustrophobic
            urban environment, telling the terrifying story of two estranged sisters. After Beth (Lily Sullivan) visits her
            sister Ellie (Alyssa Sutherland), who is raising her children alone in a small apartment in Los Angeles, they
            unwittingly unleash flesh-possessing demons from the cursed Necronomicon. The sisters are thrust into a horrifying
            battle for survival as they face the nightmare of demonic possession.',
            'trailer_url' => 'https://youtu.be/BqQNO7BzN08',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Get Out',
            'poster' => 'public/images/moviesposter/get out.jpg',
            'duration' => '104 minutes',
            'release_date' => 'February 24, 2017',
            'director' => 'Jordan Peele',
            'cast' => 'Daniel Kaluuya as Chris Washington
                        Allison Williams as Rose Armitage,
                        Catherine Keener as Missy Armitage,
                        Bradley Whitford as Dean Armitage,
                        Lil Rel Howery as Rod Williams (Chris’s friend)',
            'description' => 'The film follows Chris Washington (Daniel Kaluuya), a Black photographer, who goes to meet the parents of
            his white girlfriend, Rose Armitage (Allison Williams), at their secluded estate. Initially, Chris feels welcomed,
            but as the weekend progresses, he encounters unsettling behavior from the family and their friends.
            He discovers that they have been hypnotizing and brainwashing Black individuals to transfer their
            consciousness into their bodies. Chris must find a way to escape before he becomes the next victim.',
            'trailer_url' => 'Turkey',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Harry Potter And The Deathly Hallows',
            'poster' => 'public/images/moviesposter/Harry Potter and the Deathly Hallows.jpg',
            'duration' => '146 minutes',
            'release_date' => 'November 19, 2010',
            'director' => 'J.K. Rowling',
            'cast' => 'Daniel Radcliffe as Harry Potter
                        Emma Watson as Hermione Granger,
                        Rupert Grint as Ron Weasley,
                        Ralph Fiennes as Lord Voldemort,
                        Helena Bonham Carter as Bellatrix Lestrange,
                        Michael Gambon as Albus Dumbledore,
                        Maggie Smith as Minerva McGonagall,
                        Gary Oldman as Sirius Black,
                        Matthew Lewis as Neville Longbottom,
                        Bonnie Wright as Ginny Weasley,
                        Tom Felton as Draco Malfoy,
                        Jason Isaacs as Lucius Malfoy,
                        David Thewlis as Remus Lupin,
                        Emma Thompson as Sybill Trelawney,
                        John Hurt as Mr. Ollivander',
            'description' => 'Harry Potter and the Deathly Hallows" follows Harry Potter, Hermione Granger, and Ron Weasley
            as they embark on a quest to defeat the dark wizard Voldemort. Instead of returning to Hogwarts for their final
            year, the trio sets out to find and destroy Voldemorts Horcruxes—objects containing pieces of his soul, which grant him immortality.
            As they journey through the wizarding world, they uncover the legend of the Deathly Hallows, three powerful magical
            objects: the Elder Wand, the Resurrection Stone, and the Invisibility Cloak. The story culminates in the Battle of
            Hogwarts, where Harry confronts Voldemort in a final showdown.',
            'trailer_url' => 'https://youtu.be/MxqsmsA8y5k',
            'country_id' => 2,

        ]);
        Movie::create([
            'title' => 'Howel The Moving Castle',
            'poster' => 'public/images/moviesposter/howel the movie castle.jpg',
            'duration' => '119 minutes',
            'release_date' => 'November 20, 2004',
            'director' => 'Hayao Miyazaki',
            'cast' => 'Chieko Baisho as Sophie Hatter
                        Takuya Kimura as Howl Jenkins,
                        Akihiro Miwa as The Witch of the Waste,
                        Tatsuya Gashuin as Markl,
                        Yoji Matsuda as The Prince',
            'description' => 'The story follows Sophie, a young woman who is cursed by the Witch of the Waste and
            transformed into an elderly lady. In her quest to break the curse, she encounters Howl, a mysterious and
            flamboyant wizard who lives in a magical moving castle.As Sophie becomes part of Howls life and his magical
            world, she discovers themes of love, war, and self-acceptance. Together, they navigate challenges and
            confront the Witch of the Waste and the looming threat of war.',
            'trailer_url' => 'https://youtu.be/2x5SejvTMeA',
            'country_id' => 4,

        ]);
        Movie::create([
            'title' => 'IF',
            'poster' => 'public/images/moviesposter/IF.jpg',
            'duration' => '104 minutes',
            'release_date' => 'November 5, 2021',
            'director' => 'T.J. Smith',
            'cast' => 'Zachary Gordon as David
                        Lyndsy Fonseca as Sara,
                        Johnathon Schaech as Mike,
                        Jennifer Morrison as Claire,
                        Matt Bomer as Peter',
            'description' => 'While specific plot details may vary, "If" (2024) explores themes of identity,
            reality, and the choices that shape our lives. The narrative typically involves characters
            confronting their desires, fears, and the consequences of their decisions',
            'trailer_url' => 'https://youtu.be/mb2187ZQtBE',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Dolittle',
            'poster' => 'public/images/moviesposter/Dolittle.jpg',
            'duration' => '101 minutes',
            'release_date' => 'January 17, 2020',
            'director' => 'Justin Baldoni',
            'cast' => 'Robert Downey Jr. as Dr. John Dolittle,
                        Jesse Buckley as Lady Rose,
                        Harry Collett as Tommy Stubbins,
                        Rami Malek as Dab-Dab (the duck),
                        Octavia Spencer as Lemus (the ostrich),
                        John Cena as Yoshi (the polar bear)',
            'description' => '"Dolittle" follows Dr. John Dolittle (played by Robert Downey Jr.), a physician who can communicate with
            animals. After the death of his wife, he becomes reclusive, isolating himself in his lavish estate. When young Lady Rose
            (Carmen Ejogo) seeks his help to save Queen Victoria, who has fallen gravely ill, Dolittle is reluctantly drawn back into
            the world. Accompanied by a motley crew of animals, including a parrot named Polynesia and a dog named Jip, he embarks on a
            high-seas adventure to find a rare cure.',
            'trailer_url' => 'https://youtu.be/FEf412bSPLs',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Doctor Strange',
            'poster' => 'public/images/moviesposter/Doctor Strange In The Multiverse Of Madness - 2022.jpg',
            'duration' => '126 minutes',
            'release_date' => 'May 6, 2022',
            'director' => 'Sam Raimi',
            'cast' => 'Benedict Cumberbatch as Doctor Stephen Strange
                        Elizabeth Olsen as Wanda Maximoff / Scarlet Witch,
                        Xochitl Gomez as America Chavez,
                        Benedict Wong as Wong,
                        Chiwetel Ejiofor as Karl Mordo,
                        Michael Stuhlbarg as Nicodemus West,
                        Rachel McAdams as Dr. Christine Palmer',
            'description' => 'The film follows Doctor Stephen Strange (Benedict Cumberbatch) as he navigates
            the multiverse after the events of "Spider-Man: No Way Home." Strange seeks to protect America
            Chavez (Xochitl Gomez), a teenager with the power to travel between dimensions. The multiverse is
            unstable, and Strange must confront various threats, including a familiar and powerful foe, while
            dealing with the consequences of his actions',
            'trailer_url' => 'https://youtu.be/aWzlQ2N6qqg',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Puss In Boots',
            'poster' => 'public/images/moviesposter/Puss in boots.jpg',
            'duration' => '102 minutes',
            'release_date' => 'December 21, 2022',
            'director' => 'Joel Crawford',
            'cast' => 'Antonio Banderas as Puss in Boots
                        Salma Hayek as Kitty Softpaws,
                        Harvey Guillén as Perro,
                        Florence Pugh as Goldilocks,
                        Olivia Colman as Mama Bear,
                        Ray Winstone as Papa Bear,
                        John Mulaney as Jack Horner',
            'description' => 'In this sequel, Puss in Boots (voiced by Antonio Banderas) discovers that he has used up eight of his nine lives.
            Facing his mortality, he embarks on a quest to find the mythical Last Wish, which can restore his lost lives. Along the way,
            he encounters new friends and foes, including Kitty Softpaws (voiced by Salma Hayek) and a host of other characters, as he
            learns valuable lessons about courage, friendship, and the importance of living life to the fullest.',
            'trailer_url' => 'https://youtu.be/xgZLXyqbYOc',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Speak No Evil',
            'poster' => 'public/images/moviesposter/Speak No Evil Movie Poster.jpg',
            'duration' => '1 hour and 50 minutes',
            'release_date' => 'September 11, 2024',
            'director' => ' James Watkins',
            'cast' => 'James McAvoy,
                        Mackenzie Davis,
                        Scoot McNairy,
                        Aisling Franciosi,
                        Alix West Lefler,
                        Dan Hough,
                        Kris Hitchen',
            'description' => 'A family is invited to spend a whole weekend in a lonely home in the countryside,
            but as the weekend progresses, they realize that a dark side lies within the family who invited them.',
            'trailer_url' => 'https://youtu.be/ZdElmLKTqFY',
            'country_id' => 1,

        ]);
        Movie::create([
            'title' => 'Spirited Away',
            'poster' => 'public/images/moviesposter/Spirited Away.jpg',
            'duration' => '125 minutes',
            'release_date' => 'July 20, 2001',
            'director' => 'Hayao Miyazaki',
            'cast' => 'Rumi Hiiragi as Chihiro/Sen,
                        Miyu Irino as Haku,
                        Mari Natsuki as Yubaba/Zeniba,
                        Takuya Kimura as No-Face,
                        Yasuko Matsuyuki as Lin',
            'description' => '"Spirited Away" follows the story of Chihiro, a 10-year-old girl who becomes trapped in a
            mysterious spirit world after her parents are transformed into pigs. As she navigates this fantastical realm
            filled with gods, spirits, and witches, Chihiro must find a way to rescue her parents and return to the human world.
            She takes a job at a bathhouse run by the witch Yubaba and meets a variety of unique characters, including the enigmatic Haku,
            who helps her on her journey.',
            'trailer_url' => 'https://youtu.be/ByXuk9QqQkk',
            'country_id' => 4,

        ]);
        Movie::create([
            'title' => 'The Maze Runner',
            'poster' => 'public/images/moviesposter/The Maze Runner.jpg',
            'duration' => '113 minutes',
            'release_date' => 'September 19, 2014',
            'director' => 'Wes Ball',
            'cast' => 'Dylan OBrien as Thomas,
                        Kaya Scodelario as Teresa,
                        Will Poulter as Gally,
                        Thomas Brodie-Sangster as Newt,
                        Aml Ameen as Alby,
                        Ki Hong Lee as Minho',
            'description' => '"The Maze Runner" is based on the novel by James Dashner. It follows Thomas (Dylan OBrien), who
            wakes up in a mysterious, enclosed environment known as the Glade, with no memory of his past. The Glade is surrounded
            by a giant maze that changes every night. Thomas joins a group of boys, known as Gladers, who have formed their own
            society while trying to survive and find a way out. As they face various challenges, including monstrous creatures
            called Grievers, Thomas discovers clues about his past and the true nature of the Maze.',
            'trailer_url' => 'https://youtu.be/AwwbhhjQ9Xk',
            'country_id' => 1,

        ]);
    }
}
