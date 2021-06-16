<?php

namespace App\Stackflows\UserTask;

use Stackflows\GatewayApi\Api\UserTaskApi;
use Stackflows\StackflowsPlugin\Services\UserTask\CompleteUserTaskJob;

class CompleteTaskJob extends CompleteUserTaskJob
{
    public function beforeHandle(UserTaskApi $api)
    {
        // setting extra attributes or doing any pre complete procedures and modify request.
    }
}
