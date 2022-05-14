<?php

namespace App\Interfaces;

use App\Models\User;
use App\Models\Wish;

interface WishRepositoryInterface
{
    public function getWishs(User $user);
    public function createWish(User $user,array $data): Wish;
    public function getPossibleWishs(User $user);
}
