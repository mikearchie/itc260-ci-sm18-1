<?php
//applcation/views/news/view.php

$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$pics['title'].'</h2>';


foreach ($pics as $pic):

    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';?>

        <h3><?php echo $pic->title; ?></h3>
        <div class="main">
                <?php echo "<img title='" . $pic->title . "' src='" . $photo_url . "' />" ?>
        </div>
        <!-- <p><a href="<?php //echo site_url('pics/'.$pic['slug']); ?>">View pic</a></p> -->


                            <!-- <h3><?php //echo $news_item['title']; ?></h3>
                            <div class="main">
                                    <?php //echo $news_item['text']; ?>
                            </div>
                            <p><a href="<?php //echo site_url('news/'.$news_item['slug']); ?>">View article</a></p> -->



<?php endforeach;


$this->load->view($this->config->item('theme') . 'footer');
