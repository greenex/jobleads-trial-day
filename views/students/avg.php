<?php
/* @var $result Array */

?>

<h1>Classes AVG</h1>

<table class="table">
    <thead>
        <tr>
            <th>Class</th>
            <th>AVG</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Class 1</th>
            <th><?= $result['class1_avg']?></th>
        </tr>
        <tr>
            <th>Class 2</th>
            <th><?= $result['class2_avg']?></th>
        </tr>
        <tr>
            <th>Class 3</th>
            <th><?= $result['class3_avg']?></th>
        </tr>
    </tbody>
</table>

<h1>Overall AVG</h1>
<h2><?= ($result['class1_avg']+$result['class2_avg']+$result['class3_avg'])/3 ?></h2>
