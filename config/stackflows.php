<?php

return [
    // Address of the Stack Flows API.
    'apiHost' => env('STACKFLOWS_API_HOST'),

    // API Auth token
    'authToken' => env('STACKFLOWS_AUTH_TOKEN'),
    'environmentToken' => env('STACKFLOWS_ENVIRONMENT_TOKEN'),

    'external_task_executors' => [
        \App\Bpmn\Tasks\RetrieveVehicleActiveCargoesTaskExecutor::class,
        \App\Bpmn\Tasks\RetrieveActiveLastTaskTaskExecutor::class,
    ],

    'user_task_sync' => [],
];
