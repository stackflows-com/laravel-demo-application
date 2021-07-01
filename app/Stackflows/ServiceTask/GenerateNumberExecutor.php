<?php

namespace App\Stackflows\ServiceTask;

use Stackflows\GatewayApi\Model\ServiceTask;
use Stackflows\GatewayApi\Model\Variable;
use Stackflows\StackflowsPlugin\Services\ServiceTask\ServiceTaskExecutorInterface;

class GenerateNumberExecutor implements ServiceTaskExecutorInterface
{
    public function getReference(): array
    {
        return ['GENERATE_RANDOM_NUMBER_0_2000'];
    }

    public function getLockDuration(): int
    {
        return 5000;
    }

    public function execute(ServiceTask $task): ServiceTask
    {
        $var = new Variable(['name' => 'randomIntegerValue', 'type' => 'integer']);
        $var->setValue((object)[rand(0, 2000)]);
        $task->setVariables([$var]);

        return $task;
    }
}
