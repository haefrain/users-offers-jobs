<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public static function getAllOffers() {
        return self::with('users')->get();
    }

    public static function storeOffer($data) {
        $users = $data['users'];
        unset($data['users']);
        $offer = self::create($data);
        $offer->users()->attach($users);
        return self::with('users')->find($offer->id);
    }

    /* Relations */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_offers');
    }

    public function userOffer() {
        return $this->belongsTo(UserOffer::class, 'offer_id', 'id');
    }
}
