<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>

use yii\helpers\Html;
use johnitvn\ajaxcrud\CrudAsset; 
use yii\helpers\Url;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <div id="ajaxCrudDatatable">
        <?="<?php\n"?>
            <?php if (!empty($generator->searchModelClass)): ?>
                return $this->render('_grid', [ 
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            <?php else: ?>               
                return $this->render('_grid', [
                    'dataProvider' => $dataProvider,
                ]);
            <?php endif; ?>            
        <?="?>\n"?>
    </div>
</div>



<?php
    Modal::begin([       
        'id'=>'ajaxCrubModal',
        'header' => '<h4 class="modal-title"></h4>',
    ]);
?>
    <p>Đang tải dữ liệu</p>
    <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
    </div>   

<?php Modal::end(); ?>

