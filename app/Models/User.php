<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'user_id', 'id');
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'user_id', 'id');
    }
    public function upcomingReservations()
    {
        return $this->reservation()->whereHas('showtime', function ($query) {
            $query->where('show_date', '>', now());
        })->get();
    }
    public function pastReservations()
    {
        return $this->reservation()->whereHas('showtime', function ($query) {
            $query->where('show_date', '<=', now());
        })->get();
    }
    public function getRecommendedMovies()
    {
        $userGenreIds = $this->reservation()
            ->with('movie.moviegenre')
            ->get()
            ->flatMap(function ($reservation) {
                return $reservation->movie->moviegenre->pluck('id');
            })
            ->unique();
        $reservedMovieIds = $this->reservation()->pluck('movie_id');
        return Movie::whereHas('moviegenre', function ($query) use ($userGenreIds) {
            $query->whereIn('movie_genre_id', $userGenreIds);
        })
            ->whereNotIn('id', $reservedMovieIds)
            ->take(5)
            ->get();
    }
}
