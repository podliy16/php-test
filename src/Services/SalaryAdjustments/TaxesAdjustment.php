<?php

namespace Services\SalaryAdjustments;

use Contracts\PercentSalaryAdjustment;
use Models\User;

class TaxesAdjustment implements PercentSalaryAdjustment
{
    private const BASE_TAX = 20;
    private const MIN_KIDS_COUNT_TO_DECREASE_TAX = 3;
    private const DECREASE_TAX_BY = 2;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getPercentAdjustment(): float
    {
        $kidsCount = $this->user->getKidsCount();
        $tax = self::BASE_TAX;
        if ($kidsCount >= self::MIN_KIDS_COUNT_TO_DECREASE_TAX) {
            $tax -= self::DECREASE_TAX_BY;
        }

        return $tax;
    }

}