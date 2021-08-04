<?php

namespace App\Stackflows\Signal;

use Stackflows\StackflowsPlugin\Channels\SignalChannel;
use Stackflows\StackflowsPlugin\Stackflows;

class ThrowSignalAction
{
    private SignalChannel $channel;

    public function __construct(Stackflows $stackflows)
    {
        $this->channel = $stackflows->getSignalChannel();
    }

    /**
     * @param string $signal
     * @param array $variables
     * @throws \Stackflows\GatewayApi\ApiException
     */
    public function execute(string $signal, array $variables = []): void
    {
        $this->channel->throw($signal, $variables);
    }
}
