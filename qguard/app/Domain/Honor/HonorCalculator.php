<?php

namespace App\Domain\Honor;

use InvalidArgumentException;

class HonorCalculator
{
    public const DEFAULTS = ['raw_rating_reference_response_divisor' => 20.0, 'allowed_rating_deviation' => 20.0, 'established_honor_response_fraction' => 0.10, 'startup_honor_response_fraction' => 0.05, 'startup_eligible_rating_count' => 5];

    public readonly array $settings;

    public function __construct(?array $settings = null)
    {
        $settings ??= self::DEFAULTS;
        foreach (self::DEFAULTS as $name => $default) {
            if (! isset($settings[$name]) || ! is_numeric($settings[$name]) || ! is_finite((float) $settings[$name])) {
                throw new InvalidArgumentException('Invalid honor setting: '.$name);
            }
        }
        if ($settings['raw_rating_reference_response_divisor'] < 1 || $settings['allowed_rating_deviation'] <= 0 || $settings['startup_honor_response_fraction'] <= 0 || $settings['startup_honor_response_fraction'] > 1 || $settings['established_honor_response_fraction'] <= 0 || $settings['established_honor_response_fraction'] > 1 || ! is_int($settings['startup_eligible_rating_count']) || $settings['startup_eligible_rating_count'] < 0) {
            throw new InvalidArgumentException('Honor settings are out of range.');
        }
        $this->settings = $settings;
    }

    public static function input(array $dimensions): float
    {
        if (count($dimensions) !== 3) {
            throw new InvalidArgumentException('Three dimensions are required.');
        }
        foreach ($dimensions as $value) {
            if (! is_int($value) || $value < 1 || $value > 10) {
                throw new InvalidArgumentException('Ratings must be integers from 1 to 10.');
            }
        }

        return (array_sum($dimensions) / 3 - 1) * 100 / 9;
    }

    public function step(array $previous, float $new_input_teammate_behavior_rating): array
    {
        $previous_honor_score = (float) $previous['honor_score'];
        $count = $previous['eligible_rating_count'];
        $reference = $previous['smoothed_raw_rating_reference'];
        if (! is_int($count) || $count < 0 || ! is_finite($previous_honor_score) || $previous_honor_score < 0 || $previous_honor_score > 100 || ! is_finite($new_input_teammate_behavior_rating) || $new_input_teammate_behavior_rating < 0 || $new_input_teammate_behavior_rating > 100 || ($count === 0 && $reference !== null) || ($count > 0 && ($reference === null || ! is_finite((float) $reference) || $reference < 0 || $reference > 100))) {
            throw new InvalidArgumentException('Invalid honor state or input.');
        }
        $distance_from_previous_smoothed_raw_rating_reference = $count === 0 ? 0 : abs($new_input_teammate_behavior_rating - $reference);
        $rating_influence_multiplier = 1 / (1 + ($distance_from_previous_smoothed_raw_rating_reference / $this->settings['allowed_rating_deviation']) ** 2);
        $honor_response_fraction = $count < $this->settings['startup_eligible_rating_count'] ? $this->settings['startup_honor_response_fraction'] : $this->settings['established_honor_response_fraction'];

        return ['honor_score' => round($previous_honor_score + $honor_response_fraction * $rating_influence_multiplier * ($new_input_teammate_behavior_rating - $previous_honor_score), 8),
            'smoothed_raw_rating_reference' => round($count === 0 ? $new_input_teammate_behavior_rating : $reference + ($new_input_teammate_behavior_rating - $reference) / $this->settings['raw_rating_reference_response_divisor'], 8),
            'eligible_rating_count' => $count + 1];
    }
}
