<?php

namespace App\Bpmn\Output;

use App\Bpmn\Models\Cargo;
use App\Bpmn\Models\CargoCollection;
use Stackflows\StackflowsPlugin\Bpmn\Outputs\ExternalTaskOutputInterface;

class RetrieveVehicleActiveCargoesTaskOutput implements ExternalTaskOutputInterface
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

    public function getVariables(): array
    {
        $output = [];
        /** @var Cargo $cargo */
        foreach ($this->getCargoes() as $cargo) {
            $output[] = [
                'id' => $cargo->getId(),
                'maxTemperature' => $cargo->getMaxTemperature(),
                'minTemperature' => $cargo->getMinTemperature(),
                'requiredEngineRunMode' => $cargo->getRequiredEngineRunMode(),
                'requiredTemperature' => $cargo->getRequiredTemperature(),
                'temperatureSensitive' => $cargo->getTemperatureSensitive(),
            ];
        }

        return ['vehicleActiveCargoes' => $output];
    }
}
