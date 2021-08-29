<?php

namespace App\Bpmn\Models;

class CargoModel
{
    private string $id;
    private string $temperatureSensitive;
    private string $requiredTemperature;
    private string $requiredEngineRunMode;
    private string $minTemperature;
    private string $maxTemperature;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTemperatureSensitive(): string
    {
        return $this->temperatureSensitive;
    }

    public function setTemperatureSensitive(string $temperatureSensitive): self
    {
        $this->temperatureSensitive = $temperatureSensitive;
        return $this;
    }

    public function getRequiredTemperature(): string
    {
        return $this->requiredTemperature;
    }

    public function setRequiredTemperature(string $requiredTemperature): self
    {
        $this->requiredTemperature = $requiredTemperature;
        return $this;
    }

    public function getRequiredEngineRunMode(): string
    {
        return $this->requiredEngineRunMode;
    }

    public function setRequiredEngineRunMode(string $requiredEngineRunMode): self
    {
        $this->requiredEngineRunMode = $requiredEngineRunMode;
        return $this;
    }

    public function getMinTemperature(): string
    {
        return $this->minTemperature;
    }

    public function setMinTemperature(string $minTemperature): self
    {
        $this->minTemperature = $minTemperature;
        return $this;
    }

    public function getMaxTemperature(): string
    {
        return $this->maxTemperature;
    }

    public function setMaxTemperature(string $maxTemperature): self
    {
        $this->maxTemperature = $maxTemperature;
        return $this;
    }
}
