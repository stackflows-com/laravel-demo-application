<?php

namespace App\Stackflows\ServiceTask;

use Stackflows\GatewayApi\Model\ServiceTask;
use Stackflows\GatewayApi\Model\Variable;
use Stackflows\StackflowsPlugin\Services\ServiceTask\ServiceTaskExecutorInterface;

class DemoExecutor implements ServiceTaskExecutorInterface
{
    public function getReference(): array
    {
        return ['demo'];
    }

    public function getLockDuration(): int
    {
        return 5000;
    }

    public function execute(ServiceTask $task): ServiceTask
    {
        echo sprintf("\nHandle service task\n id: %s\n key: %s\n", $task->getId(), $task->getProcessDefinitionKey());
        $this->printVars($task->getVariables());

        $variables = $this->changeStatus($task->getVariables());
        $task->setVariables($variables);
        return $task;
    }

    private function changeStatus(array $variables): array
    {
        return array_map(
            function (Variable $var) {
                if ($var->getName() === 'status') {
                    $var->setValue((object)['awesome']);
                }
                return $var;
            },
            $variables
        );
    }

    /**
     * @param Variable[]|null $variables
     */
    private function printVars(?array $variables)
    {
        foreach ($variables as $var) {
            $val = is_array($var->getValue()) ? $var->getValue()[0]: $var->getValue();
            echo sprintf("%s: %s\n", $var->getName(), $val);
        }
    }
}
