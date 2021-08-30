<?php

namespace App\Bpmn\Responses;

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
        return $this->getCargoes()->toArray();
    }
}
