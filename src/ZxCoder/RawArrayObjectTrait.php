<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 06.04.17
 * Time: 13:46
 */

namespace ZxCoder;


trait RawArrayObjectTrait
{
    public static function fromRawArray(array $raw)
    {
        $o = new static();
        $reflection = new \ReflectionClass($o);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();

            if (isset($raw[$propertyName])) {
                $propertyValue = $raw[$propertyName];
                if ($propertyValue instanceof \DateTime) {
                    $propertyValue = $propertyValue->format('Y-m-d H:i:s');
                }
                $property->setValue($o, $propertyValue);
            }
        }

        return $o;
    }
}