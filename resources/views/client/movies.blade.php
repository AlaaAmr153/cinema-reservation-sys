@extends('layouts.layout')
@section('title')
    Movies
@endsection
@push('style')
    <link rel='stylesheet' href='{{ asset('css/client/style/pages/movies.css') }}'>
@endpush

@section('content')

        <section class="top">
            <form name="filters">
                <label for="genre" class="select" data-icon-before="genre"><span>Choose Genre</span></label>
                <input type="text" id="genre" name="genre" hidden>
                <label for="region" class="select" data-icon-before="region"><span>Choose Region</span></label>
                <input type="text" id="day" name="region" hidden>
                <label for="rating" class="select" data-icon-before="child"><span>Choose Rating</span></label>
                <input type="text" id="rating" name="rating" hidden>
                <label for="sort" class="select" data-icon-before="sort"><span>Sorting</span></label>
                <input type="text" id="sort" name="sort" hidden>
            </form>
        </section>
        <section class="bottom">
            <div class="movies">
                <div class="movie">
                    <div class="wrapper" data-id="2" data-genre="Comedy" data-rating="R">
                        <img src="images/posters/2.jpg" class="loading" alt="A Simple Favor">
                    </div>
                    <h4>A Simple Favor</h4>
                    <p>104 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id=" 3" data-genre="Action" data-rating="PG-13">
                        <img src="images/posters/3.jpg" class="loading" alt="Venom">
                    </div>
                    <h4>Venom</h4>
                    <p>112 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="4" data-genre="Action" data-rating="PG-13">
                        <img src="images/posters/4.jpg" class="loading" alt="Mission: Impossible - Fallout">
                    </div>
                    <h4>Mission: Impossible - Fallout</h4>
                    <p>147 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="5" data-genre="Romance" data-rating="PG-13">
                        <img src="images/posters/5.jpg" class="loading" alt="The Hows of Us">
                    </div>
                    <h4>The Hows of Us</h4>
                    <p>117 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="6" data-genre="Comedy" data-rating="PG">
                        <img src="images/posters/6.jpg" class="loading" alt="Johnny English Strikes Again">
                    </div>
                    <h4>Johnny English Strikes Again</h4>
                    <p>89 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="7" data-genre="Comedy" data-rating="PG-13">
                        <img src="images/posters/7.jpg" class="loading" alt="Crazy Rich Asians">
                    </div>
                    <h4>Crazy Rich Asians</h4>
                    <p>121 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="8" data-genre="Animation" data-rating="PG">
                        <img src=".images/posters/8.jpg" class="loading" alt="Smallfoot">
                    </div>
                    <h4>Smallfoot</h4>
                    <p>97 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="11" data-genre="Mystery" data-rating="NC-17">
                        <img src="images/posters/11.jpg" class="loading" alt="Killing for the Prosecution">
                    </div>
                    <h4>Killing for the Prosecution</h4>
                    <p>123 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="12" data-genre="Comedy" data-rating="PG-13">
                        <img src="images/posters/12.jpg" class="loading" alt="Hello Mr Billionaire">
                    </div>
                    <h4>Hello Mr Billionaire</h4>
                    <p>119 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="13" data-genre="Drama" data-rating="PG-13">
                        <img src="images/posters/13.jpg" class="loading" alt="Miss Granny">
                    </div>
                    <h4>Miss Granny</h4>
                    <p>114 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="16" data-genre="Drama" data-rating="PG">
                        <img src="images/posters/16.jpg" class="loading" alt="Europe Raiders">
                    </div>
                    <h4>Europe Raiders</h4>
                    <p>101 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="17" data-genre="Thriller" data-rating="PG-13">
                        <img src="images/posters/17.jpg" class="loading" alt="The Negotiation">
                    </div>
                    <h4>The Negotiation</h4>
                    <p>113 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="18" data-genre="Romance" data-rating="G">
                        <img src="images/posters/18.jpg" class="loading" alt="Cry Me A Sad River">
                    </div>
                    <h4>Cry Me A Sad River</h4>
                    <p>105 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="20" data-genre="Comedy" data-rating="PG">
                        <img src="images/posters/20.jpg" class="loading" alt="Sui Dhaaga">
                    </div>
                    <h4>Sui Dhaaga</h4>
                    <p>126 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="21" data-genre="Crime" data-rating="NC-17">
                        <img src="images/posters/21.jpg" class="loading" alt="Killed by Rock and Roll">
                    </div>
                    <h4>Killed by Rock and Roll</h4>
                    <p>90 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="22" data-genre="Animation" data-rating="G">
                        <img src="images/posters/22.jpg" class="loading" alt="Godzilla: Planet of the Monsters">
                    </div>
                    <h4>Godzilla: Planet of the Monsters</h4>
                    <p>89 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper" data-id="23" data-genre="Animation" data-rating="G">
                        <img src="images/posters/23.jpg" class="loading"
                            alt="Thomas & Friends: Big World! Big Adventures!">
                    </div>
                    <h4>Thomas & Friends: Big World! Big Adventures!</h4>
                    <p>81 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="1" data-genre="Drama" data-rating="PG-13">
                        <img src="images/posters/1.jpg" class="loading" alt="First Man">
                    </div>
                    <h4>First Man*</h4>
                    <p>150 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="9" data-genre="Adventure" data-rating="PG-13">
                        <img src="images/posters/9.jpg" class="loading"
                            alt="Fantastic Beasts: The Crimes Of Grindelwald">
                    </div>
                    <h4>Fantastic Beasts: The Crimes Of Grindelwald*</h4>
                    <p>116 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="10" data-genre="Action" data-rating="NC-17">
                        <img src="images/posters/10.jpg" class="loading" alt="Rampant">
                    </div>
                    <h4>Rampant*</h4>
                    <p>129 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="14" data-genre="Action" data-rating="R">
                        <img src="images/posters/14.jpg" class="loading" alt="The Predator">
                    </div>
                    <h4>The Predator*</h4>
                    <p>107 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="15" data-genre="Documentary" data-rating="PG-13">
                        <img src="images/posters/15.jpg" class="loading" alt="16 levers de soleil ">
                    </div>
                    <h4>16 levers de soleil *</h4>
                    <p>117 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="19" data-genre="Animation" data-rating="G">
                        <img src="images/posters/19.jpg" class="loading" alt="Manou the Swift">
                    </div>
                    <h4>Manou the Swift*</h4>
                    <p>88 min</p>
                </div>
                <div class="movie">
                    <div class="wrapper disabled" data-id="24" data-genre="Drama" data-rating="R">
                        <img src="images/posters/24.jpg" class="loading" alt="Burning">
                    </div>
                    <h4>Burning*</h4>
                    <p>148 min</p>
                </div>
            </div>
        </section>
@endsection

@push('script')
    <script type='application/javascript' src='{{ asset('js/client/javascript/pages/movies.js') }}'></script>
@endpush
