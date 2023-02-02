<?php

namespace j3yzz\MultiNotify\Builders;

use Illuminate\Support\Arr;
use j3yzz\MultiNotify\Contracts\Builder;

/**
 *
 */
class SmsBuilder implements Builder
{
    /**
     * @var array
     */
    protected array $recipients = [];

    /**
     * @var string
     */
    protected string $body;

    /**
     * @var string
     */
    protected string $driver;

    /**
     * @param $recipients
     * @return Builder
     */
    public function to($recipients): Builder
    {
        $this->recipients = Arr::wrap($recipients);

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Builder
     */
    public function send(string $body): Builder
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string $driver
     * @return Builder
     */
    public function via(string $driver): Builder
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @return array
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @return string|null
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }
}
