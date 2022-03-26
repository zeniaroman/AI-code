<?php
declare(strict_types=1);
namespace App\Controller;

// Abstract Command class with the abstract method execute with param App\command\Context $context and with getRequest method that create and returns the request object instance from namespace App\Controller\RequestHelper
abstract class CommandAbstract
{
    abstract public function execute(Context $context);

    public function getRequest(): RequestHelper
    {
        return new RequestHelper;
    }
}