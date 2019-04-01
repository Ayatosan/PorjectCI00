<h1>Ajouter un article </h1>
<?php echo validation_errors() ?>
<form method="post">
  <div>
    <label for="article_name">Titre de l'article</label></br>
    <input name="article_name" type="text" value="<?php echo set_value('article_name') ?>" />
    <?php echo form_error('article_name') ?>
  </div>
  <div>
  <label for="article_name">Contenu de l'article</label></br>
  <textarea name="article_body"><?php echo set_value('article_body') ?></textarea>
  <?php echo form_error('article_body') ?>
  </div>
  <div>
  <input type="submit" value="Enregistrer"></input></br>
  </div>
</form>
