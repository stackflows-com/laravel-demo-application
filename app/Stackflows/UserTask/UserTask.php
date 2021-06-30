<?php

namespace App\Stackflows\UserTask;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Stackflows\StackflowsPlugin\Services\UserTask\InternalStackflowsUserTaskModel;

class UserTask extends Model implements InternalStackflowsUserTaskModel
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    public function getStackflowsUserTaskKey(): string
    {
        return $this->stackflowsUserTaskKey;
    }

    public function getStackflowsUserTaskDefinitionKey(): string
    {
        return $this->stackflowsUserTaskDefinitionKey;
    }

    /**
     * Scope a query to only include pending user tasks.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('completed', false);
    }
}
