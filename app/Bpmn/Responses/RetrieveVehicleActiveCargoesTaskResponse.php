<?php

namespace App\Bpmn\Responses;

use Illuminate\Support\Collection;
use Stackflows\StackflowsPlugin\Bpmn\Responses\ExternalTaskResponseInterface;

class RetrieveVehicleActiveCargoesTaskResponse extends Collection implements ExternalTaskResponseInterface
{
    public function toArray(): array
    {
        return parent::toArray();
    }
}
