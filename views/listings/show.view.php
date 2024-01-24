<?php

// include basepath('views\partials\head.php');
loadPartial('head');

// include basepath('views\partials\navbar.php');
loadPartial('navbar');
// basepath()
?>


<div>
    <a href="/listing?id=<?=$listings->id?>">link</a>
    <p>id:<?=$listings->id?></p>
    <p>name:<?=$listings->name?></p>
    <p>age:<?=$listings->age?></p>
    
</div>


<?php

// include basepath('views\partials\footer.php')
loadPartial('footer');
?>