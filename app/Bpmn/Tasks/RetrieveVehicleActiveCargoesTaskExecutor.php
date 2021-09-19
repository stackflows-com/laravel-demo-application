<?php

namespace App\Bpmn\Tasks;

use App\Bpmn\Input\RetrieveVehicleActiveCargoesTaskInput;
use Stackflows\StackflowsPlugin\Bpmn\ExternalTasks\ExternalTaskExecutorInterface;
use Stackflows\StackflowsPlugin\Bpmn\Inputs\ExternalTaskInputInterface;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\ExternalTaskOutputInterface;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\StandardOutput;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\Variable;

final class RetrieveVehicleActiveCargoesTaskExecutor implements ExternalTaskExecutorInterface
{
    public function getTopic(): string
    {
        return 'RETRIEVE_VEHICLE_ACTIVE_CARGOES';
    }

    public function getRequestObjectClass(): string
    {
        return RetrieveVehicleActiveCargoesTaskInput::class;
    }

    public function getLockDuration(): int
    {
        return config('app.debug') ? 1 : 10000; // will take 5 minutes to resolve task again if failure occurred
    }

    public function execute(ExternalTaskInputInterface $task): ExternalTaskOutputInterface
    {
        $cargoes = [
            [
                'maxTemperature' => 15,
                'minTemperature' => -20,
                'requiredEngineRunMode' => 'con',
                'requiredTemperature' => 18,
                'temperatureSensitive' => true,
            ],
            [
                'maxTemperature' => 15,
                'minTemperature' => -20,
                'requiredEngineRunMode' => 'con',
                'requiredTemperature' => 18,
                'temperatureSensitive' => false,
            ]
        ];

        $output = new StandardOutput();

        $variable = new Variable();
        $variable->setName('vehicleActiveCargoes');
        $variable->setValue($cargoes);

        $output->addVariable($variable);

        return $output;
    }
}
