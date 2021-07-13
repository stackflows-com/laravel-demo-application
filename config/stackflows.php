<?php

return [
    // Address of the Stack Flow Gateway API.
    'host' => env('STACKFLOWS_HOST'),

    // Address of the Stack Flow Gateway API.
    'backofficeHost' => env('STACKFLOWS_BACKOFFICE_HOST'),

    // Stackflows instance UUID.
    'instance' => env('STACKFLOWS_INSTANCE'),

    /*
     * Service task executors are classes that handle Stackflows service tasks.
     * Must implements interface \Stackflows\StackflowsPlugin\ServiceTaskExecutorInterface
     */
    'service_task_executors' => [
        \App\Stackflows\ServiceTask\DemoExecutor::class,
        \App\Stackflows\ServiceTask\GenerateNumberExecutor::class,
    ],

    /*
     * User task synchronizers are classes that handle Stackflows service tasks.
     * Must implements interface \Stackflows\StackflowsPlugin\Services\UserTask\UserTaskSyncInterface
     */
    'user_task_sync' => [
        \App\Stackflows\UserTask\DemoSynchronizer::class,
        \App\Stackflows\UserTask\SolveNumberSynchronizer::class,
    ],
];
