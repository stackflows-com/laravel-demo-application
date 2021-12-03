<?php

namespace App\Bpmn\Tasks;

use App\Bpmn\Input\LastActivePrecedingTaskInput;
use App\Bpmn\Input\RetrieveVehicleActiveCargoesTaskInput;
use Stackflows\StackflowsPlugin\Bpmn\ExternalTasks\ExternalTaskExecutorInterface;
use Stackflows\StackflowsPlugin\Bpmn\Inputs\ExternalTaskInputInterface;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\ExternalTaskOutputInterface;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\StandardOutput;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\Variable;

final class RetrieveActiveLastTaskTaskExecutor implements ExternalTaskExecutorInterface
{
    public function getTopic(): string
    {
        return 'RETRIEVE_LAST_ACTIVE_PRECEDING_TASK';
    }

    public function getInputClass(): string
    {
        return LastActivePrecedingTaskInput::class;
    }

    public function getLockDuration(): int
    {
        return config('app.debug') ? 1 : 10000; // will take 5 minutes to resolve task again if failure occurred
    }

    public function execute(ExternalTaskInputInterface $task): ?ExternalTaskOutputInterface
    {
        $tasks = [
            [
                'person' => 'Max'
            ]
        ];

        $output = new StandardOutput();
//        $output->addVariable('precedingTask', $tasks);
        $output->addVariable('precedingTask', null);

        return $output;
    }
}
