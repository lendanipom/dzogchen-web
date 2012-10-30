<?php
/**
  Template Page for the gallery overview

  Follow variables are useable :

  $gallery     : Contain all about the gallery
  $images      : Contain all images, path, title
  $pagination  : Contain the pagination content

  You can check the content when you insert the tag <?php var_dump($variable) ?>
  If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
 * */
?>
<?php if (!defined('ABSPATH'))
    die('No direct access allowed'); ?><?php if (!empty($gallery)) : ?>

    <?php foreach ($images as $image) : ?>

        <a href="<?php echo $image->ngg_custom_fields["URL"]; ?>" title="<?php echo $image->linktitle ?>" <?php echo $image->thumbcode ?> >
            <img class="<?php echo $image->classname ?>" src="<?php echo $image->imageURL ?>" alt="<?php echo $image->alttext ?>" title="<?php echo $image->alttext ?>" />
        </a>


        <?php if ($image->hidden)
            continue; ?>
    <?php endforeach; ?>

<?php endif; ?>