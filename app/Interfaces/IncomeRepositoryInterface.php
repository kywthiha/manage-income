<?php

namespace App\Interfaces;

use App\Models\Income;
use App\Models\User;

interface IncomeRepositoryInterface
{
    public function getIncomes(User $user, ?string $year = null): array;
    public function getCurrentTotalExtraMoney(User $user): float;
    public function createIncome(User $user, array $data): Income;
}
