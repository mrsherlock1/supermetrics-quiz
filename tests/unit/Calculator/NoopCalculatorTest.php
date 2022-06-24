<?php

namespace Tests\unit\Calculator;

use PHPUnit\Framework\TestCase;
use Faker\Factory;
use SocialPost\Dto\SocialPostTo;
use Statistics\Calculator\NoopCalculator;
use DateTime;
use Statistics\Dto\ParamsTo;
use Statistics\Dto\StatisticsTo;

class NoopCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function test_do_calculate()
    {
        $date = new DateTime();
        $params = (new ParamsTo())
            ->setStartDate($date)
            ->setEndDate($date)
            ->setStatName('');
        $noopCalculator = (new NoopCalculator())->setParameters($params);
        for ($i = 1; $i < 21; $i++) {
            $dto = (new SocialPostTo())
                ->setDate($date)
                ->setAuthorId($i);
            $noopCalculator->accumulateData($dto);
        }

        $calculate = $noopCalculator->calculate();
        $this->assertInstanceOf(StatisticsTo::class, $calculate);
        $this->assertEquals($calculate->getValue(), 1);

    }
}