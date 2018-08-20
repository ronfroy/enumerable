<?php

declare(strict_types=1);

namespace Enumerable;

abstract class Enumerable
{
    /** @var mixed[] */
    private static $cache = [];

    /** @var mixed */
    private $value;

    /**
     * Enumerable constructor.
     *
     * @param mixed $value
     */
    final public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    final public function __invoke()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    final public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * @throws \ReflectionException
     *
     * @return array
     */
    final public static function getAll(): array
    {
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$cache)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$cache[$calledClass] = $reflect->getConstants();
        }

        return self::$cache[$calledClass];
    }

    /**
     * @param string $name
     *
     * @throws \ReflectionException
     *
     * @return bool
     */
    final public static function isValidName(string $name): bool
    {
        $constants = self::getAll();

        return array_key_exists($name, $constants);
    }

    /**
     * @param mixed $value
     *
     * @throws \ReflectionException
     *
     * @return bool
     */
    final public static function isValidValue($value): bool
    {
        $values = array_values(self::getAll());

        return in_array($value, $values, true);
    }

    /**
     * @param mixed|Enumerable $enum
     *
     * @return bool
     */
    final public function equals($enum)
    {
        if (is_object($enum)) {
            if (get_class($enum) !== get_class($this)) {
                return false;
            }

            return $this() === $enum();
        }

        return $this->value === $enum;
    }
}
