<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;
?>

<div id="slider" class="carousel slide" data-ride="carousel" data-interval="<?php echo $interval; ?>" style="background:#e53935;">
  <ol class="carousel-indicators">
    <?php foreach($items as $i => $item): ?>
      <li data-target="#slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? "active" : ""; ?>"></li>
    <?php endforeach; ?>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php foreach($items as $i => $item): ?>
    <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?>">
      <img class="d-block img-fluid" src="<?php echo $item->imageURL; ?>" alt="<?php echo $item->title; ?>">
      <?php if (!empty($item->imageCaption)): ?>
        <div class="carousel-caption d-none d-md-block">
            <h2 style="color: white; background:rgba(0,0,0,0.5); padding:15px 10px;"><?php echo $item->imageCaption; ?></h2>
        </div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
  
  <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>