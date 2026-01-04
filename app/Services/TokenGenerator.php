<?php

namespace App\Services;

use App\Models\Token;
use Illuminate\Support\Str;

class TokenGenerator
{
    /**
     * Generate a unique 12-character token
     */
    public static function generate(): string
    {
        do {
            $token = strtoupper(Str::random(12));
        } while (Token::where('token', $token)->exists());

        return $token;
    }

    /**
     * Generate multiple tokens
     */
    public static function generateMultiple(int $count): array
    {
        $tokens = [];
        for ($i = 0; $i < $count; $i++) {
            $tokens[] = self::generate();
        }
        return $tokens;
    }
}

