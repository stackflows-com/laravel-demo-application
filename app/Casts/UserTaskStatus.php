<?php

namespace App\Casts;

use App\Stackflows\TaskStatus;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class UserTaskStatus implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return TaskStatus
     */
    public function get($model, $key, $value, $attributes)
    {
        return new TaskStatus($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param TaskStatus $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        if (! $value instanceof TaskStatus) {
            throw new InvalidArgumentException('The given value is not an TaskStatus instance.');
        }

        return $value->get();
    }
}
