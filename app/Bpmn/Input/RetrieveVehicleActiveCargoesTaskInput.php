<?php

namespace App\Bpmn\Input;

use Stackflows\StackflowsPlugin\Bpmn\Inputs\AbstractExternalTaskInput;

class RetrieveVehicleActiveCargoesTaskInput extends AbstractExternalTaskInput
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
