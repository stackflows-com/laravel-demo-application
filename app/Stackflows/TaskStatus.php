<?php

namespace App\Stackflows;

class TaskStatus
{
    const PENDING = 0;
    const SENDING = 1;
    const COMPLETED = 2;
    const ERROR = 3;

    const MAP = [
        self::PENDING => 'pending',
        self::SENDING => 'sending',
        self::COMPLETED => 'completed',
        self::ERROR => 'error',
    ];

    private int $status = 0;

    public function __construct(int $status = 0)
    {
        $this->set($status);
    }

    public function set(int $status): self
    {
        if (! self::valid($status)) {
            throw new \InvalidArgumentException("Unknown task status");
        }

        $this->status = $status;
        return $this;
    }

    public function get(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return bool
     */
    public static function valid($status): bool
    {
        if (! is_numeric($status)) {
            return false;
        }

        return array_key_exists($status, self::MAP);
    }

    public function is(int $status): bool
    {
        return $this->status === $status;
    }

    public function __toString(): string
    {
        return self::MAP[$this->status];
    }
}
