<?php

namespace j3yzz\MultiNotify\Builders;

use j3yzz\MultiNotify\Contracts\Builder;

class MailBuilder implements Builder
{

    public function to($recipients): Builder
    {
        // TODO: Implement to() method.
    }

    public function getBody(): string
    {
        // TODO: Implement getBody() method.
    }

    public function send(string $body): Builder
    {
        // TODO: Implement send() method.
    }

    public function via(string $driver): Builder
    {
        // TODO: Implement via() method.
    }

    public function getRecipients(): array
    {
        // TODO: Implement getRecipients() method.
    }

    public function getDriver(): ?string
    {
        // TODO: Implement getDriver() method.
    }
}
