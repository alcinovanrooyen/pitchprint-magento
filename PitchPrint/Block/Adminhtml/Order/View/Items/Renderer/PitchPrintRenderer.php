<?php

namespace PitchPrintInc\PitchPrint\Block\Adminhtml\Order\View\Items\Renderer;

class PitchPrintRenderer extends \Magento\Sales\Block\Adminhtml\Order\View\Items\Renderer\DefaultRenderer
{
    
    public function fetchPpId()
    {
		$options 	= $this->getItem()['product_options']['info_buyRequest'];
		$ppId 		= null;
		
        if ( isset($options['_pitchprint']) )
        {
            return $options['_pitchprint'];
        }
        
		return $ppId;
    }
    
    private function consoleLog($item)
    {
        $item = json_encode($item);
        
        echo "<script>console.log($item);</script>";
    }
}