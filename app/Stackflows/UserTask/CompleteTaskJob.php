<?php

namespace App\Stackflows\UserTask;

use App\Stackflows\TaskStatus;
use Exception;
use Stackflows\GatewayApi\Api\UserTaskApi;
use Stackflows\StackflowsPlugin\Services\UserTask\CompleteUserTaskJob;

class CompleteTaskJob extends CompleteUserTaskJob
{
    public function beforeHandle(UserTaskApi $api)
    {
        // setting extra attributes or doing any pre complete procedures and modify request.
    }

    public function afterHandle()
    {
        $id = $this->task->getKey();
        UserTask::where('id', $id)->update(['status' => TaskStatus::COMPLETED]);
    }

    public function failed(Exception $exception)
    {
        $id = $this->task->getKey();
        UserTask::where('id', $id)->update(['status' => TaskStatus::ERROR]);
        report($exception);
    }
}
