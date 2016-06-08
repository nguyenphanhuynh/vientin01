<?php
/* @var $this RequestsController */
/* @var $model Requests */

$this->breadcrumbs=array(
	'Requests'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Requests', 'url'=>array('index')),
	array('label'=>'Create Requests', 'url'=>array('create')),
	array('label'=>'Update Requests', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Requests', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Requests', 'url'=>array('admin')),
);
?>

<h1>View Requests #<?php echo $model->id; ?></h1>
<fieldset>
	<legend>ID: <?php echo $model->id; ?></legend>
	<hr>
	<div>Date: <?php echo $model->posted_date;?></div>
	<hr>
	<div>Content</div>
<pre>
<?php
var_dump(json_decode($model->content));
?>
</pre>
</fieldset>