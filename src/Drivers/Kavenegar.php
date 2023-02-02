<?php

namespace j3yzz\MultiNotify\Drivers;

use j3yzz\MultiNotify\Contracts\Driver;
use Kavenegar\KavenegarApi;

class Kavenegar extends Driver
{
    protected KavenegarApi $client;

    protected function boot(): void
    {
        $this->client = new KavenegarApi($this->settings['apiKey']);
    }

    public function send()
    {
        $response = collect();

        foreach ($this->recipients as $recipient) {
            $response->put(
                $recipient,
                $this->client->Send($this->settings['from'], $recipient, $this->body)
            );
        }

        return $response;
    }

    public function sendBulk()
    {
        // TODO: Implement sendBulk() method.
    }
}
