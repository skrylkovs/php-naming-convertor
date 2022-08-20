<?php

declare(strict_types=1);

namespace Skrylkovs\Library;

final class Converter
{
    static public function convertArrayKeys(array $oldArray, string $mode = 'camelcase_to_snakecase'): array
    {
        $newArray = [];

        foreach (array_keys($oldArray) as $oldKey) {
            $newKey = match ($mode) {
                'camelcase_to_snakecase' => self::convertFromCamelCaseToSnakeCase($oldKey),
                default => $oldKey,
            };

            $newArray[$newKey] = $oldArray[$oldKey];
        }

        return $newArray;
    }

    static public function convertFromCamelCaseToSnakeCase(string $value)
    {
        $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';
        preg_match_all($pattern, $value, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ?
                strtolower($match) :
                lcfirst($match);
        }

        return implode('_', $ret);
    }
}
