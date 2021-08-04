<?php

namespace App\Stackflows\ServiceTask;

use Stackflows\GatewayApi\Model\ServiceTask;
use Stackflows\GatewayApi\Model\Variable;
use Stackflows\StackflowsPlugin\Services\ServiceTask\ServiceTaskExecutorInterface;
use Stackflows\StackflowsPlugin\VariableCollection;

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
        $vars = new VariableCollection();
        $vars->addVariableValue('randomIntegerValue', rand(0, 2000));

        return $task->setVariables($vars->all());
    }
}
