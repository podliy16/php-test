<?php

use PHPUnit\Framework\TestCase;
use Models\User;
use Services\SalaryAdjustments\TaxesAdjustment;

class TaxesAdjustmentTest extends TestCase
{

    public function testGetSalaryChangeWithMoreThanTwoKids()
    {
        $alice = new User("Alice", 52, 3, 10000, true);
        $taxesAdjustment = new TaxesAdjustment($alice);
        $adjustmentValue = $taxesAdjustment->getPercentAdjustment();

        $this->assertEquals(18, $adjustmentValue);
    }

    public function testGetSalaryChangeWithZeroKids()
    {
        $alice = new User("Alice", 52, 0, 10000, true);
        $taxesAdjustment = new TaxesAdjustment($alice);
        $adjustmentValue = $taxesAdjustment->getPercentAdjustment();

        $this->assertEquals(20, $adjustmentValue);
    }

}
