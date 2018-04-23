<div class="clearfix"></div>
<div class="row-fluid">
	<div class="container">
    	<div class="holder-content pads-2">
            <h3 class="betting-tips score" style="width: 250px ! important;"><span>Payment Confirmation</span></h3>
           	<div class="clearfix"></div>
            <div class="row-fluid">
            	<div class="span12 box2">
                	<div class="msg" id="msg">
                    	Payment completed successfully                        
                    </div>
                        <?php                            
                            /*foreach ($orders as $order)
                            {                                
                                echo "<br><b>".$order->title."</b> (".CHtml::link("Download",Yii::app()->request->baseUrl."/home/update/?prod_id=$order->id&order=$orders_details->id&name=$order->title",
                                                                                  array('class'=>'download_link')).")" ;
                            }*/   
                            foreach ($orders as $order)
                            {                                
                                echo "<br><b>".$order->title."</b> (".CHtml::link("Download",Yii::app()->request->baseUrl."/home/download/?id=$order->id",
                                                                                  array('class'=>'download_link')).")" ;
                            }                                                         
                        ?>
                </div>
            </div>
        </div>
	</div>
</div>

<?php 

    ?>