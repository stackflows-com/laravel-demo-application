<?php

namespace App\Stackflows\UserTask;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Stackflows\StackflowsPlugin\Services\UserTask\InternalStackflowsUserTaskModel;

class UserTask implements InternalStackflowsUserTaskModel
{
    private string $id;
    private ?string $stackflowsUserTaskKey;
    private ?string $stackflowsUserTaskDefinitionKey;

    public function __construct(?string $stackflowsUserTaskKey, ?string $stackflowsUserTaskDefinitionKey)
    {
        $this->id = (string)Str::uuid();
        $this->stackflowsUserTaskKey = $stackflowsUserTaskKey;
        $this->stackflowsUserTaskDefinitionKey = $stackflowsUserTaskDefinitionKey;
    }

    public function getKey(): string
    {
        return $this->id;
    }

    public function getStackflowsUserTaskKey(): string
    {
        return $this->stackflowsUserTaskKey;
    }

    public function getStackflowsUserTaskDefinitionKey(): string
    {
        return $this->stackflowsUserTaskDefinitionKey;
    }
}
