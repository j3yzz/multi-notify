<?php

namespace j3yzz\MultiNotify;

use j3yzz\MultiNotify\Builders\MailBuilder;
use j3yzz\MultiNotify\Builders\SmsBuilder;
use j3yzz\MultiNotify\Contracts\Builder;

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
     * @var string
     */
    protected string $method;

    /**
     * @var array
     */
    protected array $settings;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $method
     * @return Notify
     * @throws \Exception
     */
    public function method(string $method): self

    {
        if (!in_array($method, self::METHODS)) {
            throw new \Exception('This method is not allowed!');
        }

        $this->method = $method;

        if ($method == self::METHOD_MAIL) {
            $this->builder = new MailBuilder();
        } else {
            $this->builder = new SmsBuilder();
        }

        $this->via($this->config["{$this->method}_default_driver"]);

        return $this;
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
        $this->settings = $this->config['drivers'][$this->method][$driver];

        return $this;
    }

    public function send($message)
    {
        $this->builder->send($message);

        $driver = $this->getDriverInstance();
        $driver->message($message);

        return $driver->send();
    }

    public function sendBulk($message)
    {
        $this->builder->sendBulk($message);

        $driver = $this->getDriverInstance();
        $driver->message($message);

        return $driver->sendBulk();
    }

    /**
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->builder;
    }

    protected function getDriverInstance()
    {
        $class = $this->config['map'][$this->method][$this->driver];
        return new $class($this->settings);
    }
}
