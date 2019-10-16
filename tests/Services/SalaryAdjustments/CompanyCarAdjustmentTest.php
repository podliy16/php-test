<?php

use PHPUnit\Framework\TestCase;
use Models\User;
use Services\SalaryAdjustments\CompanyCarAdjustment;

class CompanyCarAdjustmentTest extends TestCase
{

    public function testGetSalaryChangeWithCar()
    {
        $alice = new User("Alice", 52, 3, 10000, true);
        $companyCarAdjustment = new CompanyCarAdjustment($alice);
        $adjustmentValue = $companyCarAdjustment->getAdjustment();

        $this->assertEquals(-500, $adjustmentValue);
    }

    public function testGetSalaryChangeWithZeroKids()
    {
        $alice = new User("Alice", 52, 3, 10000, false);
        $companyCarAdjustment = new CompanyCarAdjustment($alice);
        $adjustmentValue = $companyCarAdjustment->getAdjustment();

        $this->assertEquals(0, $adjustmentValue);
    }

}
