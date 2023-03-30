<?php

namespace Rabari\Backend\Block\Adminhtml\System\Config;

/**
 * Class Extensions
 * @package Rabari\Backend\Block\Adminhtml\System\Config
 */
class Extensions extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return '<iframe id="rabari_store" width="100%" src="https://www.rabari.com/contacts" ></iframe>';
    }
}
