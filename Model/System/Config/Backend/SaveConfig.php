<?php

namespace Rabari\Backend\Model\System\Config\Backend;

use Magento\Framework\App\Config\Storage\WriterInterface;

class SaveConfig extends \Magento\Framework\App\Config\Value
{
    /**
     * Configuration paths
     */
    const CSP_FRONTEND_URI  = 'csp/mode/storefront/report_uri';
    const CSP_ADMIN_URI     = 'csp/mode/admin/report_uri';
    
    private $writerInterface;
    
    /**
     * 
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param WriterInterface $writerInterface
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        WriterInterface $writerInterface,    
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,        
        array $data = []           
    ) {
        $this->writerInterface = $writerInterface;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    /**
     * Prepare data before save
     *
     * @return $this
     */
    public function beforeSave()
    {
        parent::beforeSave();
        
        $value = $this->getValue();
        $path = $this->getPath();
        
        if($path == self::CSP_FRONTEND_URI){
            $this->writerInterface->save(self::CSP_FRONTEND_URI, $value);
            $this->writerInterface->save(self::CSP_ADMIN_URI, $value);
        }
        
        return $this;
    }
}