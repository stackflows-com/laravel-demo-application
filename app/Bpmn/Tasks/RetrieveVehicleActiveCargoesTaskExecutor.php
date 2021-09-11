<?php

namespace App\Bpmn\Tasks;

use App\Bpmn\Input\RetrieveVehicleActiveCargoesTaskInput;
use App\Bpmn\Models\Cargo;
use App\Bpmn\Models\CargoCollection;
use App\Bpmn\Input\RetrieveVehicleActiveCargoesTaskRequest;
use App\Bpmn\Output\RetrieveVehicleActiveCargoesTaskOutput;
use Stackflows\StackflowsPlugin\Bpmn\ExternalTasks\ExternalTaskExecutorInterface;
use Stackflows\StackflowsPlugin\Bpmn\Inputs\ExternalTaskInputInterface;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\ExternalTaskOutputInterface;

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
        // TODO: Implement execute() method.

        $cargoes = new CargoCollection();

        $cargo = new Cargo();
        $cargo->setId(1);
        $cargo->setMaxTemperature(15);
        $cargo->setMinTemperature(5);
        $cargo->setRequiredEngineRunMode('con');
        $cargo->setRequiredTemperature(12);
        $cargo->setTemperatureSensitive(true);

        $cargoes->add($cargo);

        $cargo = new Cargo();
        $cargo->setId(2);
        $cargo->setMaxTemperature(30);
        $cargo->setMinTemperature(20);
        $cargo->setRequiredEngineRunMode('con');
        $cargo->setRequiredTemperature(23);
        $cargo->setTemperatureSensitive(false);

        $cargoes->add($cargo);

        return new RetrieveVehicleActiveCargoesTaskOutput($cargoes);
    }
}
