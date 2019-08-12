<?php
/* @var $this yii\web\View */
/* @var $repository app\repositories\FilesRepository */
?>
<h1>files/index</h1>

<h3>file1.txt</h3>
<?= $this->render('partials/_elementsTable', ['elements'=>$repository->getTextData()]); ?>

<hr>

<h3>file2.csv</h3>
<?= $this->render('partials/_elementsTable', ['elements'=>$repository->getCsvData()]); ?>

<hr>

<h3>file1.txt Asc</h3>
<?= $this->render('partials/_elementsTable', ['elements'=>$repository->getSortedTextData()]); ?>

<hr>

<h3>file2.csv Asc</h3>
<?= $this->render('partials/_elementsTable', ['elements'=>$repository->getSortedCsvData()]); ?>


<hr>

<h3>Intersect</h3>
<?= $this->render('partials/_elementsTable', ['elements'=>$repository->getIntersect()]); ?>
