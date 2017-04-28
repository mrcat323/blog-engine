<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $results["article"]->title . " | " . NAME;?></title>
  <meta name="description" content="<?php echo $results['article']->text;?>">
  <meta name="keywords" content="<?php echo $results['article']->title;?>">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
  <br />
  <div class="col-md-6 col-md-offset-4">
    &nbsp;&nbsp;<a class="btn-lg btn-default" href="./"><span class="glyphicon glyphicon-chevron-left"> Back</span></a>
      <h1><?php echo $results['pageTitle']?></h1>
      <div class="form-cat">
      <form class="form-inline" action="index.php?action=<?php echo $results['formAction']?>" method="post" role="form">
        <input type="hidden" name="id" value="<?php echo $results['article']->id ?>"/>
        <ul>
          <li>
            <label>Article Title</label>
            <input type="text" name="title" class="form-control article-cat type-text" placeholder="Name of the article" required autofocus maxlength="70" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
          </li>
          <li>
            <label>Article Content</label>
            <textarea name="text" class="form-control article-cat" placeholder="The HTML content of the article" required maxlength="100000" style="height: 10em;"><?php echo htmlspecialchars( $results['article']->text )?></textarea>
        </li>
      </ul>
        <div class="buttons">
          <input class="btn btn-success" type="submit" name="saveChanges" value="Save Changes" />
          <input class="btn btn-danger faro" type="submit" formnovalidate name="cancel" value="Cancel">
<?php if ( $results['article']->id ): ?>
      <p><a class="btn btn-danger fa fa-trash del" href="index.php?action=delete&amp;id=<?php echo $results['article']->id ?>" onclick="return confirm('Really delete this article?')"> Delete This Article</a></p>
<?php endif ?>
</div>
      </form>
    </div>
</div>
</body>
</html>