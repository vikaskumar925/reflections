<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/uniform.default.css"></link>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.uniform.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.dataTables.min.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.dataTables.bootstrap.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>

	<?php 
		$t = yii::app()->user->id;
		$k  =User::model()->findByPk($t);
	/*	print_r($k->user_type);*/
			
	//print_r($_POST);
	//print_r($usert); ?>

<?php 

function getInternalRepairLog($tid){ 

	$rl=RepairLog::model()->findByAttributes(array('ticket_id'=>$tid, 'private_record'=>2),array('order' => 'TS  desc'));

if(!empty($rl)) return $rl->log;

return '';

}


?>
<?php 
//$model = new Ticket;
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $model ,
	'id'=>'ticket-grid',
	'enableSorting'=>true,
	'itemsCssClass' => 'table table-striped dataTable table-bordered',	
	'htmlOptions' => array(
		'class' => 'df table-responsive'
	) ,
	'columns' => array(
		array(
			'header' => 'Ticket#',
			'name'=>'id',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->id)'
		) ,
		
		array(
			'header' => 'Navn',
			'name'=>'user_id', 
			'type' => 'raw',
			'value' => '($data->user->name)'
		) ,
		array(
			'header' => 'Postnr',
			'name'=>'user_id',
			'type' => 'raw',
			'value' => '($data->user->zip)'
		) ,
		array(
			'header' => 'Klipper',
			'name' => 'product_id',
			'type' => 'raw',
			'value' => '($data->product->name)'
		) ,
		array(
			'header' => 'Kjøpssted',
			'name' => 'user_machine_id',
			'type' => 'raw',
			'value' => '($data->UserMachines->order_place)'
		) ,
		array(
			'header' => 'Kjøpsdato- Garanti',
			'name' =>'user_machine_id',
			'type' => 'raw',
			'value' => 'date("d-m-Y",strtotime($data->UserMachines->order_date))'
		) ,
		array(
			'header' => 'Parts',
			'type' => 'raw',
			'value' => '($data->user->name;)'
		) ,
		array(
			'header' => 'Reg.av',
			'type' => 'raw',
			'value' => 'empty($data->created_by)?$data->shop_contact:$data->created_by'
		) ,
		array(
			'header' => 'Info',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::image(Yii::app()->theme->baseUrl."/img/icons/essen/16/consulting.png",""),Yii::app()->createUrl("admin/ticket/TicketView",array("id"=>CHtml::encode($data->id))), array("class"=>"btn btn-mini tip ticket_info","id"=>CHtml::encode($data->id)))'
		) ,
		array(
			'header' => 'Gruppe',
			'type' => 'raw',
			'value' => ''
		) ,
		array(
			'header' => 'Beskrivelse',
			'type' => 'raw',
			'value' => '($data->user->name;)'
		) ,
		array(
			'header' => 'Aksjon',
			'type' => 'raw',
			'value' =>'CHtml::link(CHtml::image(Yii::app()->theme->baseUrl."/img/icons/fugue/magnifier.png",""),Yii::app()->createUrl("admin/ticket/TicketView",array("id"=>CHtml::encode($data->id))), array("title"=>"Show details","class"=>"btn btn-mini tip")).CHtml::link(CHtml::image(Yii::app()->theme->baseUrl."/img/icons/essen/16/customers.png",""),Yii::app()->createUrl("admin/user/view",array("id"=>$data->user_id)), array("title"=>"View Customer Info","class"=>"btn btn-mini tip")).CHtml::image(Yii::app()->theme->baseUrl."/img/icons/fugue/binocular.png","")',
		) ,
		
		
		
	) ,
	));
?>

<script>

	$('.ticket_info').on({ mouseover:function(){

		var ids='info'+this.id;

		//alert(ids);

		$('#'+ids).show();

	 },

	 mouseout:function(){

		var ids= 'info'+this.id;

		//alert(ids);

		$('#'+ids).hide();

	 }

	 });

</script>

