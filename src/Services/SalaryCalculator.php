<?php

namespace Services;

use Models\User;
use Services\SalaryAdjustments\CompanyCarAdjustment;
use Services\SalaryAdjustments\OldAgeAdjustment;
use Services\SalaryAdjustments\TaxesAdjustment;

class SalaryCalculator
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function calculateTotalSalary(): float
    {
        $salary = $this->user->getBaseSalary();

        $oldAgeAdjustment = new OldAgeAdjustment($this->user);
        $oldAgeAdjustmentValue = $oldAgeAdjustment->getPercentAdjustment();
        $salary += (($salary / 100.0) * $oldAgeAdjustmentValue);

        $taxesAdjustment = new TaxesAdjustment($this->user);
        $taxesAdjustmentValue = $taxesAdjustment->getPercentAdjustment();
        $salary -= (($salary / 100.0) * $taxesAdjustmentValue);

        $companyCarAdjustment = new CompanyCarAdjustment($this->user);
        $companyCarAdjustmentValue = $companyCarAdjustment->getAdjustment();
        $salary += $companyCarAdjustmentValue;

        return $salary;
    }

}
