<?php

abstract class Task
{
    public function printSections()
    {
        $this->printHeader();
        $this->printBody();
        $this->printFooter();
        $this->printCustom();
    }

    private function printHeader()
    {
        printf('Header' . PHP_EOL);
    }

    private function printBody()
    {
        printf('Body' . PHP_EOL);
    }

    private function printFooter():string
    {
        printf('Footer' . PHP_EOL);
    }

    abstract protected function printCustom();

}

class DeveloperTask extends Task
{
    protected function printCustom():string
    {
        printf('for developer' . PHP_EOL);
    }
}

class DesignerTask extends Task
{
    protected function printCustom():string
    {
        printf('for designer' . PHP_EOL);
    }
}

$developerTask = new DeveloperTask();
$designerTask = new DesignerTask();

$developerTask->printSections();