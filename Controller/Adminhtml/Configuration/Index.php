<?php

    namespace PitchPrintInc\PitchPrint\Controller\Adminhtml\Configuration;

    //protected $sleep;

    class Index extends \Magento\Backend\App\Action
    {
        /**
        * @var \Magento\Framework\View\Result\PageFactory
        */
        protected $resultPageFactory;
      
        /**
         * Constructor
         *
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
        ) {
            parent::__construct($context);
            $this->resultPageFactory = $resultPageFactory;
            //$this->sleep = 'tired';
        }

        /**
         * Load the page defined in view/adminhtml/layout/exampleadminnewpage_helloworld_index.xml
         *
         * @return \Magento\Framework\View\Result\Page
         */
        public function execute()
        {
            $resultPage = $this->resultPageFactory->create();
            
            $dataOut = ['api_key' => '', 'secret_key' => ''];
            
            $dataIn = $this->ppGetCreds();
            
            if (isset($dataIn[0])) {
                $dataOut = $dataIn[0];
            }
            
            $resultPage->getLayout()->getBlock('pitch_print_conf')->setName($dataOut);
            return $resultPage;
        }
        
        private function ppGetCreds()
        {
            $objectManager  = \Magento\Framework\App\ObjectManager::getInstance();
            $resource       = $objectManager->get('Magento\Framework\App\ResourceConnection');
            $db             = $resource->getConnection();
            $tableName      = $resource->getTableName('pitch_print_config');
            
            return $db->fetchAll("SELECT * FROM $tableName");
        }
    }
?>
