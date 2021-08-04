<?php

namespace App\Stackflows\ServiceTask;

use Stackflows\GatewayApi\Model\ServiceTask;
use Stackflows\GatewayApi\Model\Variable;
use Stackflows\StackflowsPlugin\Services\ServiceTask\ServiceTaskExecutorInterface;
use Stackflows\StackflowsPlugin\VariableCollection;

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

        $variables = new VariableCollection($task->getVariables());
        $this->printVars($variables);

        $variables->changeOrCreateVariableValue('status', 'awesome');
        $task->setVariables($variables->all());

        return $task;
    }

    /**
     * @param VariableCollection $variables
     */
    private function printVars(VariableCollection $variables)
    {
        foreach ($variables->toArray() as $var) {
            $val = is_array($var->getValue()) ? $var->getValue()[0] : $var->getValue();
            echo sprintf("%s: %s\n", $var->getName(), $val);
        }
    }
}
