<?php
namespace Infomodus\Dhllabel\Model\Config;

class CopyLabels implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $c = [
            ['label' => '1', 'value' => '1'],
            ['label' => '2', 'value' => '2'],
            ['label' => '3', 'value' => '3'],
            ['label' => '4', 'value' => '4'],
            ['label' => '5', 'value' => '5'],
        ];
        return $c;
    }
}