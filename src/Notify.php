<?php

namespace j3yzz\MultiNotify;

use j3yzz\MultiNotify\Builders\Contract\Builder;
use j3yzz\MultiNotify\Builders\MailBuilder;
use j3yzz\MultiNotify\Builders\SmsBuilder;

class Notify
{
    /**
     * @var array
     */
    protected array $config;

    /**
     * @var string
     */
    protected string $driver;

    const METHOD_MAIL = 'mail';
    const METHOD_SMS = 'sms';
    const METHODS = [
        self::METHOD_SMS,
        self::METHOD_MAIL,
    ];

    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $method
     * @throws \Exception
     */
    public function method(string $method): void
    {
        if (!in_array($method, self::METHODS)) {
            throw new \Exception('This method is not allowed!');
        }

        if ($method == self::METHOD_MAIL) {
            $this->builder = new MailBuilder();
        } else {
            $this->builder = new SmsBuilder();
        }
    }

    public function to($recipients): self
    {
        $this->builder->to($recipients);

        return $this;
    }

    public function via($driver): self
    {
        $this->driver = $driver;
        $this->builder->via($driver);

        return $this;
    }

    public function send($message)
    {
        $this->builder->send($message);
    }

    /**
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->builder;
    }
}
