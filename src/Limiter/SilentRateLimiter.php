<?php
declare(strict_types=1);
namespace GuardPower\Limiter;
interface SilentRateLimiter
{
    public function limitSilently(string $identifier, Rate $rate): Status;
}
