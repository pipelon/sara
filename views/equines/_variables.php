<h5>Características</h5>
<?php
foreach ($model->variableValues as $variable):
    $grouped[$variable->subcategory->category->name][] = $variable;
endforeach;
?>
<ul class="nav nav-tabs var-detail" id="custom-tabs-three-tab" role="tablist">
    <?php $i = 0; ?>
    <?php foreach ($grouped as $category => $items): ?>
        <?php $slugCat = Yii::$app->utils->slugify($category) ?>

        <li class="nav-item">
            <a class="nav-link <?= ($i == 0) ? 'active' : '' ?>" id="custom-tabs-three-<?= $slugCat; ?>-tab"
                data-toggle="pill" href="#custom-tabs-three-<?= $slugCat; ?>" role="tab"
                aria-controls="custom-tabs-three-<?= $slugCat; ?>" aria-selected="true">
                <?= $category; ?>
            </a>
        </li>
        <?php $i++; ?>
    <?php endforeach; ?>
</ul>
<div class="tab-content" id="custom-tabs-three-tabContent">
    <?php $i = 0; ?>
    <?php foreach ($grouped as $category => $items): ?>
        <?php $slugCat = Yii::$app->utils->slugify($category) ?>
        <div class="tab-pane fade <?= ($i == 0) ? 'show active' : '' ?>" id="custom-tabs-three-<?= $slugCat; ?>" role="tabpanel"
            aria-labelledby="custom-tabs-three-<?= $slugCat; ?>-tab">
            <?php foreach ($items as $value): ?>
                <div class="var-container">
                    <div class="donut" data-value="<?= $value->variable->value; ?>" data-max="3">
                        <span><?= $value->variable->value; ?></span>
                    </div>
                    <p><?= $value->subcategory->name; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>