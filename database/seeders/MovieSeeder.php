<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = new Movie();
        $movie->title = 'Bagman';
        $movie->poster = 'images/moviesposter/Bagman.jpg';
        $movie->duration = '1 hour and 32 minutes';
        $movie->release_date = '2024-09-27';
        $movie->director = 'Colm McCarthy';
        $movie->cast = 'Sam Claflin, Antonia Thomas, and Caréll Rhoden';
        $movie->description = 'Bagman is a dark horror film about a family trapped in a nightmare as
            they are hunted by the Bagman, a mythical creature feared for snatching children. The film
            follows Patrick McKee, who narrowly escaped the Bagman as a child but now faces the terror
            again with his wife and son.the movie explores the return of this childhood tormentor as it threatens his family.';
        $movie->trailer_url = 'https://www.youtube.com/watch?v=slrzCgYIUPM';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/bagman1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/bagman2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/bagman3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/bagman4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Horror', 'Thriller'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Damsel';
        $movie->poster = 'images/moviesposter/damsel.jpg';
        $movie->duration = '1 hour 48 minutes';
        $movie->release_date = '2024-03-08';
        $movie->director = 'Juan Carlos Fresnadillo';
        $movie->cast = 'Millie Bobby Brown as Princess Elodie,
                    Angela Bassett as Lady Bayford (stepmother),
                    Robin Wright as Queen Isabelle,
                    Nick Robinson,
                    Ray Winstone as The King,
                    Brooke Carter,
                    Shohreh Aghdashloo';
        $movie->description = "Princess Elodie, portrayed by Millie Bobby Brown,
            initially dreams of a fairytale wedding with the charming Prince Henry.
            However, her dream turns into a nightmare when she discovers that her marriage was
             a ploy by the royal family to sacrifice her to a dragon as repayment for an ancient debt.
             Stranded in a dragon's lair, Elodie must use her wits and willpower to survive";
        $movie->trailer_url = 'https://youtu.be/iM150ZWovZM';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/damsel1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/damsel2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/damsel3.png']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/damsel4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Fantasy', 'Adventure', 'Drama'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Deadpool & Wolverine';
        $movie->poster = 'images/moviesposter/Deadpool & Wolverine.jpg';
        $movie->duration = '2 hours 7 minutes';
        $movie->release_date = '2024-07-26';
        $movie->director = 'Shawn Levy';
        $movie->cast = 'Ryan Reynolds as Wade Wilson/Deadpool
            Emma Corrin as Cassandra Nova (villain),
            Hugh Jackman as Wolverine,
            Matthew Macfadyen as Paradox (TVA agent),
            Brianna Hildebrand as Negasonic Teenage Warhead,
            Morena Baccarin as Vanessa,
            Channing Tatum as Gambit,
            Chris Evans as Johnny Storm (cameo),
            Henry Cavill as Wolverine (variant)';
        $movie->description = 'In this MCU-adjacent adventure, Deadpool recruits Wolverine to help save his collapsing timeline.
            The story dives into the multiverse, with plenty of humor, fights, and surprising team-ups. Cassandra Nova, played by Emma Corrin,
            emerges as a formidable villain, while the duo of Deadpool and Wolverine navigate timeline-hopping, trying to prevent Paradoxs scheme to quicken the destruction of their world';
        $movie->trailer_url = 'https://youtu.be/73_1biulkYk';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/deadpool1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/deadpool2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/deadpool3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/deadpool4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Action', 'Comedy', 'Superhero', 'Science Fiction'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Despicable Me4';
        $movie->poster = 'images/moviesposter/despicable me4.jpg';
        $movie->duration = '1 hour and 34 minutes';
        $movie->release_date = '2024-07-04';
        $movie->director = 'Chris Renaud';
        $movie->cast = 'Steve Carell (Gru), Kristen Wiig (Lucy Wilde), Will Ferrell (Maxime Le Mal), Pierre Coffin (Minions), Joey King (Poppy Prescott), Miranda Cosgrove (Margo), and Sofia Vergara (Valentina)';
        $movie->description = 'Gru and his family are back in action as they take on Maxime Le Mal,
            a new supervillain voiced by Will Ferrell. Alongside his mischievous Minions,
            Gru and his wife Lucy (Kristen Wiig) must protect their family, including their
            newest member, Gru Jr., who causes his own fair share of chaos. Expect a mix of high-stakes action,
            comedy, and heartwarming moments as Gru balances family life with his Anti-Villain League duties';
        $movie->trailer_url = 'https://youtu.be/uAjOOnHUGFM';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/despicable1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/despicable2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/despicable3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/despicable4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Animation', 'Comedy', 'Adventure'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Evil Dead Rise';
        $movie->poster = 'images/moviesposter/Evil Dead Rise.jpg';
        $movie->duration = '96 minutes';
        $movie->release_date = '2023-04-21';
        $movie->director = 'Lee Cronin';
        $movie->cast = 'Lily Sullivan as Beth,
                Alyssa Sutherland as Ellie,
                Gabrielle Echols as Bridget,
                Morgan Davies as Danny,
                Nell Fisher as Kassie';
        $movie->description = 'Evil Dead Rise (2023) is the fifth installment in the Evil Dead horror franchise.
                       Directed by Lee Cronin, the film moves the series out of the iconic cabin setting and into a claustrophobic
                       urban environment, telling the terrifying story of two estranged sisters. After Beth (Lily Sullivan) visits her
                       sister Ellie (Alyssa Sutherland), who is raising her children alone in a small apartment in Los Angeles, they
                       unwittingly unleash flesh-possessing demons from the cursed Necronomicon. The sisters are thrust into a horrifying
                       battle for survival as they face the nightmare of demonic possession.';
        $movie->trailer_url = 'https://youtu.be/BqQNO7BzN08';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/evil1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/evil2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/evil3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/evil4.png']);
        $genres = MovieGenre::whereIn('genre', ['Horror', 'Thriller', 'Fantasy'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);


        $movie = new Movie();
        $movie->title = 'Get Out';
        $movie->poster = 'images/moviesposter/get out.jpg';
        $movie->duration = '104 minutes';
        $movie->release_date = '2017-02-24';
        $movie->director = 'Jordan Peele';
        $movie->cast = 'Daniel Kaluuya as Chris Washington
                Allison Williams as Rose Armitage,
                Catherine Keener as Missy Armitage,
                Bradley Whitford as Dean Armitage,
                Lil Rel Howery as Rod Williams (Chris’s friend)';
        $movie->description = 'The film follows Chris Washington (Daniel Kaluuya), a Black photographer, who goes to meet the parents of
                       his white girlfriend, Rose Armitage (Allison Williams), at their secluded estate. Initially, Chris feels welcomed,
                       but as the weekend progresses, he encounters unsettling behavior from the family and their friends.
                       He discovers that they have been hypnotizing and brainwashing Black individuals to transfer their
                       consciousness into their bodies. Chris must find a way to escape before he becomes the next victim.';
        $movie->trailer_url = 'Turkey';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/getout1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/getout2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/getout3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/getout4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Horror', 'Thriller', 'Mystery'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Harry Potter And The Deathly Hallows';
        $movie->poster = 'images/moviesposter/Harry Potter and the Deathly Hallows.jpg';
        $movie->duration = '146 minutes';
        $movie->release_date = '2010-11-19';
        $movie->director = 'J.K. Rowling';
        $movie->cast = 'Daniel Radcliffe as Harry Potter
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
                John Hurt as Mr. Ollivander';
        $movie->description = 'Harry Potter and the Deathly Hallows follows Harry Potter, Hermione Granger, and Ron Weasley
                       as they embark on a quest to defeat the dark wizard Voldemort. Instead of returning to Hogwarts for their final
                       year, the trio sets out to find and destroy Voldemort\'s Horcruxes—objects containing pieces of his soul, which grant him immortality.
                       As they journey through the wizarding world, they uncover the legend of the Deathly Hallows, three powerful magical
                       objects: the Elder Wand, the Resurrection Stone, and the Invisibility Cloak. The story culminates in the Battle of
                       Hogwarts, where Harry confronts Voldemort in a final showdown.';
        $movie->trailer_url = 'https://youtu.be/MxqsmsA8y5k';
        $movie->country_id = 2;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/harry1.jpeg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/harry2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/harry3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/harry4.jpeg']);
        $genres = MovieGenre::whereIn('genre', ['Fantasy', 'Adventure', 'Drama'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = "Howl's Moving Castle";
        $movie->poster = 'images/moviesposter/howel the movie castle.jpg';
        $movie->duration = '119 minutes';
        $movie->release_date = '2004-11-20';
        $movie->director = 'Hayao Miyazaki';
        $movie->cast = 'Chieko Baisho as Sophie Hatter
                Takuya Kimura as Howl Jenkins,
                Akihiro Miwa as The Witch of the Waste,
                Tatsuya Gashuin as Markl,
                Yoji Matsuda as The Prince';
        $movie->description = 'The story follows Sophie, a young woman who is cursed by the Witch of the Waste and
                       transformed into an elderly lady. In her quest to break the curse, she encounters Howl, a mysterious and
                       flamboyant wizard who lives in a magical moving castle. As Sophie becomes part of Howl\'s life and his magical
                       world, she discovers themes of love, war, and self-acceptance. Together, they navigate challenges and
                       confront the Witch of the Waste and the looming threat of war.';
        $movie->trailer_url = 'https://youtu.be/2x5SejvTMeA';
        $movie->country_id = 4;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/howl1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/howl2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/howl3.jpeg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/howl4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Animation', 'Fantasy', 'Adventure'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'IF';
        $movie->poster = 'images/moviesposter/IF.jpg';
        $movie->duration = '104 minutes';
        $movie->release_date = '2021-11-05';
        $movie->director = 'T.J. Smith';
        $movie->cast = 'Zachary Gordon as David
                Lyndsy Fonseca as Sara,
                Johnathon Schaech as Mike,
                Jennifer Morrison as Claire,
                Matt Bomer as Peter';
        $movie->description = 'While specific plot details may vary, "If" (2024) explores themes of identity,
                       reality, and the choices that shape our lives. The narrative typically involves characters
                       confronting their desires, fears, and the consequences of their decisions.';
        $movie->trailer_url = 'https://youtu.be/mb2187ZQtBE';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/if1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/if2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/if3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/if4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Drama', 'Fantasy'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);


        $movie = new Movie();
        $movie->title = 'Dolittle';
        $movie->poster = 'images/moviesposter/Dolittle.jpg';
        $movie->duration = '101 minutes';
        $movie->release_date = '2020-01-17';
        $movie->director = 'Justin Baldoni';
        $movie->cast = 'Robert Downey Jr. as Dr. John Dolittle,
                Jesse Buckley as Lady Rose,
                Harry Collett as Tommy Stubbins,
                Rami Malek as Dab-Dab (the duck),
                Octavia Spencer as Lemus (the ostrich),
                John Cena as Yoshi (the polar bear)';
        $movie->description = '"Dolittle" follows Dr. John Dolittle (played by Robert Downey Jr.), a physician who can communicate with
                       animals. After the death of his wife, he becomes reclusive, isolating himself in his lavish estate. When young Lady Rose
                       (Carmen Ejogo) seeks his help to save Queen Victoria, who has fallen gravely ill, Dolittle is reluctantly drawn back into
                       the world. Accompanied by a motley crew of animals, including a parrot named Polynesia and a dog named Jip, he embarks on a
                       high-seas adventure to find a rare cure.';
        $movie->trailer_url = 'https://youtu.be/FEf412bSPLs';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/dolittle1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/dolittle2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/dolittle3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/dolittle4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Adventure', 'Comedy', 'Fantasy'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);


        $movie = new Movie();
        $movie->title = 'Doctor Strange';
        $movie->poster = 'images/moviesposter/Doctor Strange In The Multiverse Of Madness - 2022.jpg';
        $movie->duration = '126 minutes';
        $movie->release_date = '2022-05-06';
        $movie->director = 'Sam Raimi';
        $movie->cast = 'Benedict Cumberbatch as Doctor Stephen Strange
                Elizabeth Olsen as Wanda Maximoff / Scarlet Witch,
                Xochitl Gomez as America Chavez,
                Benedict Wong as Wong,
                Chiwetel Ejiofor as Karl Mordo,
                Michael Stuhlbarg as Nicodemus West,
                Rachel McAdams as Dr. Christine Palmer';
        $movie->description = 'The film follows Doctor Stephen Strange (Benedict Cumberbatch) as he navigates
                       the multiverse after the events of "Spider-Man: No Way Home." Strange seeks to protect America
                       Chavez (Xochitl Gomez), a teenager with the power to travel between dimensions. The multiverse is
                       unstable, and Strange must confront various threats, including a familiar and powerful foe, while
                       dealing with the consequences of his actions.';
        $movie->trailer_url = 'https://youtu.be/aWzlQ2N6qqg';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/doctor1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/doctor2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/doctor3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/doctor4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Action', 'Adventure', 'Fantasy', 'Superhero'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Puss In Boots';
        $movie->poster = 'images/moviesposter/Puss in boots.jpg';
        $movie->duration = '102 minutes';
        $movie->release_date = '2022-12-21';
        $movie->director = 'Joel Crawford';
        $movie->cast = 'Antonio Banderas as Puss in Boots
                Salma Hayek as Kitty Softpaws,
                Harvey Guillén as Perro,
                Florence Pugh as Goldilocks,
                Olivia Colman as Mama Bear,
                Ray Winstone as Papa Bear,
                John Mulaney as Jack Horner';
        $movie->description = 'In this sequel, Puss in Boots (voiced by Antonio Banderas) discovers that he has used up eight of his nine lives.
                       Facing his mortality, he embarks on a quest to find the mythical Last Wish, which can restore his lost lives. Along the way,
                       he encounters new friends and foes, including Kitty Softpaws (voiced by Salma Hayek) and a host of other characters, as he
                       learns valuable lessons about courage, friendship, and the importance of living life to the fullest.';
        $movie->trailer_url = 'https://youtu.be/xgZLXyqbYOc';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/puss1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/puss2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/puss3.jpeg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/puss4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Animation', 'Adventure', 'Comedy'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Speak No Evil';
        $movie->poster = 'images/moviesposter/Speak No Evil Movie Poster.jpg';
        $movie->duration = '1 hour and 50 minutes';
        $movie->release_date = '2024-09-11';
        $movie->director = 'James Watkins';
        $movie->cast = 'James McAvoy,
                Mackenzie Davis,
                Scoot McNairy,
                Aisling Franciosi,
                Alix West Lefler,
                Dan Hough,
                Kris Hitchen';
        $movie->description = 'A family is invited to spend a whole weekend in a lonely home in the countryside,
                       but as the weekend progresses, they realize that a dark side lies within the family who invited them.';
        $movie->trailer_url = 'https://youtu.be/ZdElmLKTqFY';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/speak1.jpeg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/speak2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/speak3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/speak4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Horror', 'Thriller'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'Spirited Away';
        $movie->poster = 'images/moviesposter/Spirited Away.jpg';
        $movie->duration = '125 minutes';
        $movie->release_date = '2001-07-20';
        $movie->director = 'Hayao Miyazaki';
        $movie->cast = 'Rumi Hiiragi as Chihiro/Sen,
                Miyu Irino as Haku,
                Mari Natsuki as Yubaba/Zeniba,
                Takuya Kimura as No-Face,
                Yasuko Matsuyuki as Lin';
        $movie->description = '"Spirited Away" follows the story of Chihiro, a 10-year-old girl who becomes trapped in a
                       mysterious spirit world after her parents are transformed into pigs. As she navigates this fantastical realm
                       filled with gods, spirits, and witches, Chihiro must find a way to rescue her parents and return to the human world.
                       She takes a job at a bathhouse run by the witch Yubaba and meets a variety of unique characters, including the enigmatic Haku,
                       who helps her on her journey.';
        $movie->trailer_url = 'https://youtu.be/ByXuk9QqQkk';
        $movie->country_id = 4;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/spirited1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/spirited2.png']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/spirited3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/spirited4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Animation', 'Fantasy', 'Adventure'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);

        $movie = new Movie();
        $movie->title = 'The Maze Runner';
        $movie->poster = 'images/moviesposter/The Maze Runner.jpg';
        $movie->duration = '113 minutes';
        $movie->release_date = '2014-09-19';
        $movie->director = 'Wes Ball';
        $movie->cast = 'Dylan O\'Brien as Thomas,
                Kaya Scodelario as Teresa,
                Will Poulter as Gally,
                Thomas Brodie-Sangster as Newt,
                Aml Ameen as Alby,
                Ki Hong Lee as Minho';
        $movie->description = '"The Maze Runner" is based on the novel by James Dashner. It follows Thomas (Dylan O\'Brien), who
                       wakes up in a mysterious, enclosed environment known as the Glade, with no memory of his past. The Glade is surrounded
                       by a giant maze that changes every night. Thomas joins a group of boys, known as Gladers, who have formed their own
                       society while trying to survive and find a way out. As they face various challenges, including monstrous creatures
                       called Grievers, Thomas discovers clues about his past and the true nature of the Maze.';
        $movie->trailer_url = 'https://youtu.be/AwwbhhjQ9Xk';
        $movie->country_id = 1;
        $movie->save();
        $movie->movie_image()->create(['img' => 'images/moviesimages/maze1.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/maze2.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/maze3.jpg']);
        $movie->movie_image()->create(['img' => 'images/moviesimages/maze4.jpg']);
        $genres = MovieGenre::whereIn('genre', ['Science Fiction', 'Action', 'Adventure'])->pluck('id')->toArray();
        $movie->moviegenre()->sync($genres);
    }
}
