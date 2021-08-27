<?php

namespace App\Bpmn\Tasks;

use Stackflows\StackflowsPlugin\Services\ServiceTask\ServiceTaskExecutorInterface;

final class RetrieveVehicleActiveCargoesTaskExecutor implements ServiceTaskExecutorInterface
{
    public function getTopic(): string
    {
        return 'RETRIEVE_VEHICLE_ACTIVE_CARGOES';
    }

    public function getLockDuration(): int
    {
        return config('app.debug') ? 1 : 60000; // will take 5 minutes to resolve task again if failure occurred
    }

    public function execute(): ?array
    {
        $items = [];
        $items[] = [
            'id' => 'BT1212',
            'temperatureSensitive' => 1,
            'requiredTemperature' => '-20',
            'requiredEngineRunMode' => null,
            'minTemperature' => '-15',
            'maxTemperature' => '-30',
        ];
        $items[] = [
            'id' => 'FF443',
            'temperatureSensitive' => 0,
            'requiredTemperature' => '-20',
            'requiredEngineRunMode' => null,
            'minTemperature' => '-15',
            'maxTemperature' => '-30',
        ];



        return ['vehicleActiveCargoes' => ['value' => $items]];
    }
}
