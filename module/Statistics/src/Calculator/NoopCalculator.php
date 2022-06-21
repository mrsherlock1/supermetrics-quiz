<?php

declare(strict_types = 1);

namespace Statistics\Calculator;

use SocialPost\Dto\SocialPostTo;
use Statistics\Dto\StatisticsTo;

class NoopCalculator extends AbstractCalculator
{
    protected const UNITS = 'posts';
    private array $authors = [];
    private int $postCount = 0;
    /**
     * @inheritDoc
     */
    protected function doAccumulate(SocialPostTo $postTo): void
    {
        $this->authors[] = $postTo->getAuthorId();
        $this->postCount++;
    }

    /**
     * @inheritDoc
     */
    protected function doCalculate(): StatisticsTo
    {
        $averagePost = $this->postCount / count(array_unique($this->authors));
        return (new StatisticsTo())
            ->setName($this->parameters->getStatName())
            ->setValue($averagePost)
            ->setUnits(self::UNITS);
    }
}
