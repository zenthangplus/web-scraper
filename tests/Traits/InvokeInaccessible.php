<?php

namespace Tests\Traits;

/**
 * Trait InvokeInaccessible
 * @package Tests\Traits
 */
trait InvokeInaccessible
{
    /**
     * Call protected/private method of a class.
     *
     * @param object &$object Instantiated object that we will run method on.
     * @param string $methodName $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     * @return mixed
     * @throws \ReflectionException
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Get value of protected/private property of a class
     *
     * @param object &$object Instantiated object that we will get property on.
     * @param string $propertyName
     * @return mixed
     * @throws \ReflectionException
     */
    public function invokeProperty(&$object, $propertyName)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
