<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'status',
        'password',
    ];

    public static array $statuses = [
        'active'    => 'فعال',
        'inactive'  => 'غیرفعال',
        'suspended' => 'تعلیق‌شده',
        'banned'    => 'مسدودشده',
//        'deleted'   => 'حذف‌شده',
    ];

    public static array $statusesLabels = [
        'active'    => 'badge badge-success',
        'inactive'  => 'badge badge-secondary',
        'suspended' => 'badge badge-warning',
        'banned'    => 'badge badge-danger',
//        'deleted'   => 'badge badge-dark',
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

//    public function groupSalePart()
//    {
//        return $this->hasMany(GroupSaleOrder::class);
//    }

    public function getCreatedAtFaAttribute()
    {
//        return Jalalian::fromDateTime($this->created_at)->format('Y/m/d');
        return Jalalian::fromDateTime($this->created_at)->format('%d %B %Y');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    protected static function booted()
    {
        static::deleting(function ($user) {
            $user->status = 'deleted';
            $user->save();
        });
    }
}
