<?php

namespace App\Bpmn\Tasks;

use App\Bpmn\Models\Cargo;
use App\Bpmn\Requests\RetrieveVehicleActiveCargoesTaskRequest;
use App\Bpmn\Responses\RetrieveVehicleActiveCargoesTaskResponse;
use Stackflows\StackflowsPlugin\Bpmn\ExternalTasks\ExternalTaskExecutorInterface;
use Stackflows\StackflowsPlugin\Bpmn\Requests\ExternalTaskRequestInterface;
use Stackflows\StackflowsPlugin\Bpmn\Responses\ExternalTaskResponseInterface;

final class RetrieveVehicleActiveCargoesTaskExecutor implements ExternalTaskExecutorInterface
{
    public function getTopic(): string
    {
        return 'RETRIEVE_VEHICLE_ACTIVE_CARGOES';
    }

    public function getRequestObjectClass(): string
    {
        return RetrieveVehicleActiveCargoesTaskRequest::class;
    }

    public function getLockDuration(): int
    {
        return config('app.debug') ? 1 : 60000; // will take 5 minutes to resolve task again if failure occurred
    }

    public function execute(ExternalTaskRequestInterface $task): ExternalTaskResponseInterface
    {
        // TODO: Implement execute() method.

        $response = new RetrieveVehicleActiveCargoesTaskResponse();

        $cargo = new Cargo();
        $cargo->setId(1);
        $cargo->setMaxTemperature(15);
        $cargo->setMinTemperature(5);
        $cargo->setRequiredEngineRunMode('con');
        $cargo->setRequiredTemperature(12);
        $cargo->setTemperatureSensitive(true);

        $response->add($cargo);

        $cargo = new Cargo();
        $cargo->setId(2);
        $cargo->setMaxTemperature(30);
        $cargo->setMinTemperature(20);
        $cargo->setRequiredEngineRunMode('con');
        $cargo->setRequiredTemperature(23);
        $cargo->setTemperatureSensitive(false);

        $response->add($cargo);

        return $response;
    }
}
