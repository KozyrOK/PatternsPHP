<?php

interface State
{
    public function toNext(Task $task);
    public function getStatus();
}

class Task
{
    private State $state;

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }
    public function proceedToNext(): void
    {
        $this->state->toNext($this);
    }

    public static function make(): Task
    {
        $self = new self();
        $self->setState(new Created());
        return $self;
    }

}

class Created implements State
{

    public function toNext(Task $task):void
    {
        $task->setState(new Process());
    }

    public function getStatus():string
    {
        return 'Created';
    }
}

class Process implements State
{

    public function toNext(Task $task):void
    {
        $task->setState(new Test());
    }

    public function getStatus():string
    {
        return 'Process';
    }
}

class Test implements State
{
    public function toNext(Task $task):void
    {
        $task->setState(new Done());
    }

    public function getStatus():string
    {
        return 'Text';
    }
}

class Done implements State
{
    public function toNext(Task $task)
    {
        // TODO: Implement toNext() method.
    }

    public function getStatus():string
    {
        return 'Done';
    }
}

$task = Task::make();

$task->getState();
$task->proceedToNext();
$task->proceedToNext();

var_dump($task->getState()->getStatus());