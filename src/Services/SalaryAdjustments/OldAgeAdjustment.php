<?php

namespace Services\SalaryAdjustments;

use Contracts\PercentSalaryAdjustment as PercentSalaryAdjustmentContract;
use Models\User;

class OldAgeAdjustment implements PercentSalaryAdjustmentContract
{
    private const OLDER_THEN = 50;
    private const ADD_SALARY_PERCENT = 7;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getPercentAdjustment(): float
    {
        $age = $this->user->getAge();
        $result = 0;
        if ($age > self::OLDER_THEN) {
            $result += self::ADD_SALARY_PERCENT;
        }

        return $result;
    }

}