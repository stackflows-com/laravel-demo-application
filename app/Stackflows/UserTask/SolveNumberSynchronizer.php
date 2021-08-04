<?php

namespace App\Stackflows\UserTask;

use Stackflows\GatewayApi\Model\UserTask as ApiUserTask;
use Stackflows\StackflowsPlugin\Services\UserTask\UserTaskSyncInterface;

class SolveNumberSynchronizer implements UserTaskSyncInterface
{
    private string $prefix = 'Activity_SolveNumberIs';

    public function sync(array $items, array $params = []): void
    {
        foreach ($items as $item) {
            if ($this->relevant($item)) {
                $this->createTask($item);
            }
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

    private function relevant(ApiUserTask $item): bool
    {
        return str_starts_with($item->getTaskDefinitionKey(), $this->prefix);
    }
}
