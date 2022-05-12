<?php

namespace App\Repositories;

use App\Interfaces\IncomeConfigurationRepositoryInterface;
use App\Models\IncomeConfiguration;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IncomeConfigurationRepository implements IncomeConfigurationRepositoryInterface
{
    public function getIncomeConfiguration(User $user): ?IncomeConfiguration
    {
        return $user->incomeConfiguration;
    }

    public function createIncomeConfiguration(User $user, array $data): IncomeConfiguration
    {
        DB::beginTransaction();
        try {
            $this->deleteIncomeConfiguration($user);
            $incomeConfiguration = IncomeConfiguration::create($data + ['user_id' => $user->id]);
            DB::commit();
            return  $incomeConfiguration;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteIncomeConfiguration(User $user): void
    {
        $user->incomeConfiguration()->delete();
    }
}
