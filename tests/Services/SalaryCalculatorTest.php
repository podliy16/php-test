<?php

use PHPUnit\Framework\TestCase;
use \Models\User;
use \Services\SalaryCalculator;

class SalaryCalculatorTest extends TestCase
{

    public function testSalaryChangeWithAllAdjustments()
    {
        $alice = new User("Alice", 52, 3, 10000, true);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(8274, $salary);
    }

    public function testSalaryChangeWithSalaryIncrease()
    {
        $alice = new User("Alice", 52, 1, 10000, false);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(8560, $salary);
    }

    public function testSalaryChangeWithReducedTaxes()
    {
        $alice = new User("Alice", 20, 3, 10000, false);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(8200, $salary);
    }

    public function testSalaryChangeWithCarDeduction()
    {
        $alice = new User("Alice", 20, 1, 10000, true);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(7500, $salary);
    }

    public function testSalaryChangeWithSalaryIncreasedAndReducedTaxes()
    {
        $alice = new User("Alice", 52, 3, 10000, false);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(8774, $salary);
    }

    public function testSalaryChangeWithSalaryIncreasedAndCarDeduction()
    {
        $alice = new User("Alice", 52, 1, 10000, true);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(8060, $salary);
    }

    public function testSalaryChangeWithReducedTaxesAndCarDeduction()
    {
        $alice = new User("Alice", 20, 3, 10000, true);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(7700, $salary);
    }

    public function testSalaryWithoutAnyAdjustments()
    {
        $alice = new User("Alice", 20, 1, 10000, false);
        $salaryCalculatorService = new SalaryCalculator($alice);
        $salary = $salaryCalculatorService->calculateTotalSalary();

        $this->assertEquals(8000, $salary);
    }
}
