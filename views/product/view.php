<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		
		
		<button id="addcart" name="addcart" class="btn btn-primary" style="float:right" onclick="sendFirstCategory();">Add To Cart</button>  
		<input type="hidden" name="hdnid" id="hdnid" value="<?php echo $model->id ?>">  
		
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
<script>


function sendFirstCategory(){
		var hdnid= $("#hdnid").val();
       // var test = "this is an ajax test";
		var urls='<?php echo \Yii::$app->getUrlManager()->createUrl("product/addcart")?>';
        $.ajax({
			type: 'POST',
            url: urls+'&id='+hdnid,
             data: { id: hdnid },
			 processData: false,
			 contentType: false,
             success: function(data) {
                 alert(data);
             }
         });
    }
</script>