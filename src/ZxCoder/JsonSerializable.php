<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 06.04.17
 * Time: 11:59
 */

namespace ZxCoder;


trait JsonSerializable
{
    public function jsonSerialize()
    {
        $reflection = new \ReflectionClass($this);
        /** @var \ReflectionProperty[] $properties */
        $properties = $reflection->getProperties();

        $result = [];

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $propertyValue = $property->getValue($this);

            if ($propertyValue instanceof \DateTime) {
                $propertyValue = $propertyValue->format('Y-m-d H:i:s');
            }

            $result[$propertyName] = json_decode(json_encode($propertyValue), true);
        }

        return $result;
    }
}