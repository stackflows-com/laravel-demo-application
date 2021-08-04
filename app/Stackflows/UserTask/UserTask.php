<?php

namespace App\Stackflows\UserTask;

use App\Casts\UserTaskStatus;
use App\Stackflows\TaskStatus;
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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => UserTaskStatus::class,
    ];

    public function getStackflowsUserTaskKey(): string
    {
        return $this->stackflows_id;
    }

    public function getStackflowsUserTaskDefinitionKey(): string
    {
        return $this->reference;
    }

    /**
     * Scope a query to only include pending user tasks.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', TaskStatus::PENDING);
    }
}
