<?php

// include basepath('views\partials\head.php');
loadPartial('head');

// include basepath('views\partials\navbar.php');
loadPartial('navbar');
// basepath()
?>

<?php foreach($listings as $list): ?>
<div>
    <p>id:<?=$list['id']?></p>
    <p>name:<?=$list['name']?></p>
    <p>age:<?=$list['age']?></p>
    
</div>
<?php endforeach; ?>

<?php

// include basepath('views\partials\footer.php')
loadPartial('footer');
?>