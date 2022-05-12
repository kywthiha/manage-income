<?php

namespace App\Repositories;

use App\Interfaces\IncomeConfigurationRepositoryInterface;
use App\Interfaces\IncomeRepositoryInterface;
use App\Models\Income;
use App\Models\IncomeConfiguration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeRepository implements IncomeRepositoryInterface
{

    private IncomeConfigurationRepository $incomeConfigurationRepository;

    public function __construct(IncomeConfigurationRepositoryInterface $incomeConfigurationRepository)
    {
        $this->incomeConfigurationRepository = $incomeConfigurationRepository;
    }

    public function getIncomes(User $user, ?string $year = null): array
    {
        $incomes = $user->incomes;
        if ($year) {
            $incomes = $incomes->whereYear('created_at', $year);
        }
        return $incomes->get()->toArray();
    }

    public function getCurrentTotalExtraMoney(User $user): float
    {
        return  $user->incomes()->whereBetween('date', [Carbon::now()->startOfYear()->toDateString(), Carbon::now()->endOfYear()->toDateString()])->sum('extra_money');
    }



    public function createIncome(User $user, array $data): Income
    {

        $incomeConfiguration = $this->incomeConfigurationRepository->getIncomeConfiguration($user);
        $income = $data['income'];
        $extra_money = $income * ($incomeConfiguration->extra_money_rate / 100);
        return Income::create($data + [
            'user_id' => $user->id,
            'save_money' => $income * ($incomeConfiguration->save_money_rate / 100),
            'tax_money' => $income * ($incomeConfiguration->tax_money_rate / 100),
            'general_expenses' => $income * ($incomeConfiguration->general_expenses_rate / 100),
            'extra_money' =>  $extra_money,
            'total_extra_money' => $extra_money + $this->getCurrentTotalExtraMoney($user),
            'date' => Carbon::now()->toDateString(),
            'income_configuration_id' => $incomeConfiguration->id,
        ]);
    }
}
