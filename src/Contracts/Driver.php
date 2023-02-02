<?php

namespace j3yzz\MultiNotify\Contracts;

abstract class Driver
{
    /**
     * @var array
     */
    protected array $settings = [];

    /**
     * @var array
     */
    protected array $recipients = [];

    /**
     * @var string
     */
    protected string $body = '';

    /**
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;
        $this->boot();
    }

    public function to($recipients): self
    {
        $recipients = is_array($recipients)
            ? $recipients
            : [$recipients];

        $this->recipients = $recipients;

        if (count($this->recipients) < 1) {
            throw new \Exception('recipients cannot be empty.');
        }

        return $this;
    }

    public function message(string $message): self
    {
        $message = trim($message);

        if ($message === '') {
            throw new \Exception('message cannot be empty.');
        }

        $this->body = $message;

        return $this;
    }

    abstract protected function boot(): void;

    abstract public function send();

    abstract public function sendBulk();
}
