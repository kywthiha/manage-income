<?php

namespace App\Interfaces;

use App\Models\IncomeConfiguration;
use App\Models\User;

interface IncomeConfigurationRepositoryInterface
{
    public function getIncomeConfiguration(User $user): ?IncomeConfiguration;
    public function createIncomeConfiguration(User $user, array $data): IncomeConfiguration;
    public function deleteIncomeConfiguration(User $user);
}
