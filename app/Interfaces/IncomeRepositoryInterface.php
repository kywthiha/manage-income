<?php

namespace App\Interfaces;

use App\Models\Income;
use App\Models\User;

interface IncomeRepositoryInterface
{
    public function getIncome(User $user): Income;
    public function createIncome(array $data): Income;
}
