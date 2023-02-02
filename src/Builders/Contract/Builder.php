<?php

namespace j3yzz\MultiNotify\Builders\Contract;

interface Builder
{
    public function to($recipients): self;

    public function getBody(): string;

    public function send(string $body): self;

    public function via(string $driver): self;

    public function getRecipients(): array;

    public function getDriver(): ?string;
}
