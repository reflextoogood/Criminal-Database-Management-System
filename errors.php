
<?php  if(count($errors)>0): ?>
    <div style="width: 92%;
  margin: 0px auto 7px auto;
  padding-left:5px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;" class="error">
        <?php foreach($errors as $error): ?>
                <p><?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
