<?php

namespace Services\SalaryAdjustments;

use Models\User;
use Contracts\FlatSalaryAdjustment as FlatSalaryAdjustmentContract;

class CompanyCarAdjustment implements FlatSalaryAdjustmentContract
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAdjustment(): float
    {
        $result = 0;
        if ($this->user->isUseCompanyCar()) {
            $result = -500;
        }

        return $result;
    }

}