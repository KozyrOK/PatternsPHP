<?php

abstract class Expression
{
    abstract public function interpreter(Context $context):bool;
}

class Context
{
    private array $worker = [];

    /**
     * @param string $worker
     */
    public function setWorker(string $worker): void
    {
        $this->worker[] = $worker;
    }

    public function lookUp($key):string|bool
    {
        if (isset($this->worker[$key])) {
            return $this->worker[$key];
        }
        return false;
    }

}

class VariableExp extends Expression
{
    private int $key;

    /**
     * @param int $key
     */
    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function interpreter(Context $context):bool
    {
        return $context->lookUp($this->key);
    }
}

class AndExp extends Expression
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpreter(Context $context): bool
    {
        return $context->lookUp($this->keyOne) && $context->lookUp($this->keyTwo);
    }
}

class OrExp extends Expression
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpreter(Context $context): bool
    {
        return $context->lookUp($this->keyOne) || $context->lookUp($this->keyTwo);
    }
}

$context = new Context();
$context->setWorker('Bob');
$context->setWorker('Frank');

$varExp = new VariableExp(1);
$andExp = new AndExp(1,2);
$orExp = new OrExp(1,3);

var_dump($varExp->interpreter($context));
var_dump($andExp->interpreter($context));
var_dump($orExp->interpreter($context));