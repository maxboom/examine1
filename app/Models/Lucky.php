<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Lucky extends Model
{
    private const WINNING_RATES = [
        [300, 0.1],
        [600, 0.3],
        [900, 0.5],
        [1000, 0.7],
    ];

    protected $fillable = [
        'user_id',
        'number',
    ];

    public static function generateLuckyNumber(User $user): self
    {
        return self::create([
            'user_id' => $user->id,
            'number' => rand(0, 1000),
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isLucky(): bool
    {
        return $this->number !== 0
            && $this->number % 2 === 0;
    }

    public function getWinningRate(): int
    {
        if (!$this->isLucky()) {
            return 0;
        }

        foreach (self::WINNING_RATES as [$threshold, $rate]) {
            if ($this->number <= $threshold ) {
                return $this->number * $rate;
            }
        }

        return 0;
    }
}
