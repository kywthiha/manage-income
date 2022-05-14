<?php

namespace App\Repositories;

use App\Interfaces\WishRepositoryInterface;
use App\Models\User;
use App\Models\Wish;

class WishRepository implements WishRepositoryInterface
{

    public function getWishs(User $user)
    {
        return $user->wishs()->paginate(10);
    }

    public function createWish(User $user, array $data): Wish
    {
        return Wish::create($data + ['user_id' => $user->id]);
    }

    public function getPossibleWishs(User $user)
    {
        return Wish::where('user_id', '!=', $user->id)->paginate(10);
    }
}
