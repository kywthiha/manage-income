<?php

namespace App\Interfaces;

use App\Models\User;
use App\Models\Wish;

interface WishRepositoryInterface
{
    public function getWish(User $user): Wish;
    public function createWish(array $data): Wish;
}
