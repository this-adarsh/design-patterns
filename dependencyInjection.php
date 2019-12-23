<?php

/**
 * Dependency injection is a design pattern which is used to manage dependency of one class to another class.
 * suppose below scenario which is we have a class of user activity and another class which is logger
 *and requirement is to log each activity of user
 *so we can write below logic.
 */

class userActionsWithoutDI
{
    public function createUser()
    {
        //Implimentation of create user 
        $logger = new logger();
        $logger->logData("User created");
    }
    public function updateUser()
    {
        //Implimentation of update user 
        $logger = new logger();
        $logger->logData("User updated");
    }
    public function deleteUser()
    {
        //Implimentation of update user 
        $logger = new logger();
        $logger->logData("user deleted");
    }
}

class logger
{
    public function logData($action)
    {
        echo "Logger Message $action";
    }
}

$userActionsWithoutDI = new userActionsWithoutDI();
$userActionsWithoutDI->createUser();

/**
 * We can call this implementation as above when we call any function of userActionsWithoutDI our message will logged
 */


/**
 * above code will work fine but it have below drawback's
 * 1) it causes creation of object multiple times.
 * 2) its causing repetition of code
 * so we can improve it via dependency injection by writing dependency injection logic
 */
class userActionsWithDI
{
    private $_logger;

    function __construct(\logger $logger)
    {
        $this->_logger = $logger;
    }

    public function createUser()
    {
        //Implimentation of create user 
        $this->_logger->logData("User created");
    }
    public function updateUser()
    {
        //Implimentation of update user 
        $this->_logger->logData("User updated");
    }
    public function deleteUser()
    {
        //Implimentation of update user 
        $this->_logger->logData("user deleted");
    }
}

$logger = new logger();
$userActionsWithDI = new userActionsWithDI($logger);
