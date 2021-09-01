<?php

namespace App\Bpmn\Responses;

use App\Bpmn\Models\Cargo;
use App\Bpmn\Models\CargoCollection;
use Stackflows\StackflowsPlugin\Bpmn\Responses\ExternalTaskResponseInterface;

class RetrieveVehicleActiveCargoesTaskResponse implements ExternalTaskResponseInterface
{
    private CargoCollection $cargoes;

    public function __construct(CargoCollection $cargoes)
    {
        $this->cargoes = $cargoes;
    }

    /**
     * @return CargoCollection
     */
    public function getCargoes(): CargoCollection
    {
        return $this->cargoes;
    }

    /**
     * @param CargoCollection $cargoes
     */
    public function setCargoes(CargoCollection $cargoes): void
    {
        $this->cargoes = $cargoes;
    }

    public function toArray(): array
    {
        $output = [];
        /** @var Cargo $cargo */
        foreach ($this->cargoes as $cargo) {
            $output[] = [
                'id' => $cargo->getId(),
                'maxTemperature' => $cargo->getMaxTemperature(),
                'minTemperature' => $cargo->getMinTemperature(),
                'requiredEngineRunMode' => $cargo->getRequiredEngineRunMode(),
                'requiredTemperature' => $cargo->getRequiredTemperature(),
                'temperatureSensitive' => $cargo->getTemperatureSensitive(),
            ];
        }

        return $output;
    }
}
