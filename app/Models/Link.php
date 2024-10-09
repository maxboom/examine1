<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Link extends Model
{
    private const DAYS_FOR_EXPIRE = 7;

    protected $fillable = [
        'user_id',
        'segment',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateLink(User $user)
    {
        return self::create([
            'user_id' => $user->id,
            'segment' => Str::random(),
            'expires_at' => now()->addDays(self::DAYS_FOR_EXPIRE),
        ]);
    }

    public static function findBySegment(string $segment, ?User $user = null): ?self
    {
        $query = self::query()
            ->where('segment', $segment)
            ->where('expires_at', '>', now());

        if ($user) {
            $query->whereBelongsTo($user);
        }

        return $query->first();
    }
}
