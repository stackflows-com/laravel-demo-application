<?php

return [
    // Address of the Stack Flow Gateway API.
    'gatewayHost' => env('STACKFLOWS_GATEWAY_HOST'),

    // Gateway Auth token
    'authToken' => env('STACKFLOWS_AUTH_TOKEN'),

    'external_task_executors' => [
        \App\Bpmn\Tasks\RetrieveVehicleActiveCargoesTaskExecutor::class
    ],

    'user_task_sync' => [],
];
