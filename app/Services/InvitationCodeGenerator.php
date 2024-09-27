<?php

namespace App\Services;

class InvitationCodeGenerator
{
    public function generate(): string
    {
        $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4)); // 4 lettres aléatoires
        $numbers = rand(000, 999); // 3 chiffres aléatoires
        $additionalLetters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4)); // 4 lettres aléatoires

        return "{$letters}-{$numbers}-{$additionalLetters}";
    }
}