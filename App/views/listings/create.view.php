<?=loadPartial('head')?>
<?=loadPartial('navbar')?>
<?=loadPartial('topBanner')?>

<div>
    <h5>Create Job listing</h5>
<form action="/listings/create" method="POST">
    
<div class="mb-3">
<input type="text" name="title" placeholder="Job Title" value="<?=$data['title']??'' ?>">
<div class="text-danger">
    <?=$errors['title']??'' ?>
</div>
</div>
    
    <div class="mb-3">
    
    <input type="text"  name="desc" placeholder="Job Description" value="<?=$data['desc']??'' ?>">

    <div class='text-danger'>
        <?=$errors['desc']??'' ?>
    </div>

    </div>


    <div class="mb-3">
    
    <input type="text"  name="salary" placeholder="Annual Salary" value="<?=$data['salary']??'' ?>">

    <div class='text-danger'><?=$errors['salary']??'' ?></div>

    </div>

    
    <div class="mb-3">

    <input type="text"  name="req" placeholder="Requirements" value="<?=$data['req']??'' ?>">

    </div>

    
    <div class="mb-3">

    <input type="text" name="benefit"  placeholder="Benefits" value="<?=$data['benefit']??'' ?>">

    </div>


    
    
    <input type="submit">

</form>
</div>



<?=loadPartial('footer')?>