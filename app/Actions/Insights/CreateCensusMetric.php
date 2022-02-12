<?php

namespace App\Actions\Insights;

use InfluxDB2\Point;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateCensusMetric
{
    use AsAction;

    public function handle(
        $model,
        string $measurementName,
        array $tags = [],
        bool $shouldIncrement = true,
        string $fieldName = 'count',
        array $aggregation = ['type' => 'count', 'column' => '*'],
    ) {
        $newCount = RetrieveModelAggregate::run(
            $model,
            $tags,
            $shouldIncrement,
            $fieldName,
            $aggregation
        );

        $point = Point::measurement($measurementName)
            ->addField($fieldName, $newCount)
            ->time(time());

        foreach ($tags as $tag => $property) {
            $sluggableProperty = $model;
            $tagParts = explode('.', $tag);

            foreach ($tagParts as $tagPart) {
                $sluggableProperty = $sluggableProperty->$tagPart;
            }

            $point = $point->addTag(end($tagParts), $sluggableProperty->slug);
        }

        CreateInsightMetric::run([$point]);
    }
}
