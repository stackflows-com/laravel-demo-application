<?php

namespace App\Stackflows\UserTask;

use Illuminate\Support\Str;
use Stackflows\GatewayApi\Model\UserTask as ApiUserTask;
use Stackflows\StackflowsPlugin\Services\UserTask\UserTaskSyncInterface;

class DemoSynchronizer implements UserTaskSyncInterface
{
    private string $prefix = 'user_task';

    public function sync(array $items, array $params = []): void
    {
        $tasks = [];
        foreach ($items as $item) {
            if ($this->filter($item)) {
                $tasks[] = $this->createTask($item);
            }
        }

        foreach ($tasks as $task) {
            $this->executeTask($task);
        }
    }

    private function createTask(ApiUserTask $task): UserTask
    {
        return UserTask::create(
            [
                'stackflows_id' => $task->getId(),
                'reference' => $task->getTaskDefinitionKey(),
            ]
        );
    }

    private function executeTask(UserTask $task): void
    {
        // perform some actions with the task

        CompleteTaskJob::dispatch($task);
    }

    private function filter(ApiUserTask $item): bool
    {
        return str_starts_with($item->getTaskDefinitionKey(), $this->prefix);
    }
}
