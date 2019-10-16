<?php

use PHPUnit\Framework\TestCase;
use Models\User;
use Services\SalaryAdjustments\OldAgeAdjustment;

class OldAgeAdjustmentTest extends TestCase
{

    public function testGetSalaryChangeForOldPeople()
    {
        $alice = new User("Alice", 52, 3, 10000, true);
        $oldAgeAdjustment = new OldAgeAdjustment($alice);
        $adjustmentValue = $oldAgeAdjustment->getPercentAdjustment();

        $this->assertEquals(7, $adjustmentValue);
    }

    public function testGetSalaryChangeForYoungPeople()
    {
        $alice = new User("Alice", 20, 3, 10000, true);
        $oldAgeAdjustment = new OldAgeAdjustment($alice);
        $adjustmentValue = $oldAgeAdjustment->getPercentAdjustment();

        $this->assertEquals(0, $adjustmentValue);
    }

}
