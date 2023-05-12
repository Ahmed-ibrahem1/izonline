<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Collection;




class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'username',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getCart(): Cart
    {
        // firstofcreate returns an instance with id = 0, and creates the correct model
        $cart = Cart::firstWhere('id', $this->id);
        if ($cart === null) {
            Cart::create([
                'id' => $this->id,
            ]);
            $cart = Cart::firstWhere('id', $this->id);
        }
        return $cart;
    }

    public static function purchases(User $user)
    {
        $sales = Sale::all()->where('user_id', $user->id);


        $purchases = [];
        $program  = new Program();
        foreach ($sales as $sale) {
            $program = Program::all()->where("id", $sale->program_id)->first(function ($item) {
                return $item->title;
            });;


            array_push($purchases, $program);
        }


        return $purchases;
    }

    public function getFullName()
    {
        return implode(' ', array_filter([$this->first_name, $this->middle_name, $this->last_name]));
    }
}
