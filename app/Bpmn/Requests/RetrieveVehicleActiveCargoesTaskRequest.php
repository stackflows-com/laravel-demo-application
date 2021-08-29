<?php

namespace App\Bpmn\Requests;

use Stackflows\StackflowsPlugin\Bpmn\Requests\AbstractExternalTaskRequest;

class RetrieveVehicleActiveCargoesTaskRequest extends AbstractExternalTaskRequest
{
    private string $vehicleLicensePlate;

    public function getVehicleLicensePlate(): string
    {
        return $this->vehicleLicensePlate;
    }

    public function setVehicleLicensePlate(string $vehicleLicensePlate): self
    {
        $this->vehicleLicensePlate = $vehicleLicensePlate;
        return $this;
    }
}
