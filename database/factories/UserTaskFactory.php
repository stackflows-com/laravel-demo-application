<?php

namespace Database\Factories;

use App\Stackflows\TaskStatus;
use App\Stackflows\UserTask\UserTask;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(1, 100);
        return [
            'stackflows_id' => Str::uuid(),
            'reference' => "Task #{$id}",
            'status' => new TaskStatus(TaskStatus::PENDING),
        ];
    }

    public function completed(): UserTaskFactory
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'status' => new TaskStatus(TaskStatus::COMPLETED),
                ];
            }
        );
    }

    public function sending(): UserTaskFactory
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'status' => new TaskStatus(TaskStatus::SENDING),
                ];
            }
        );
    }
}
