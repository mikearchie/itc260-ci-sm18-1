<?php
//application/view/pics/index.php

$this->load->view($this->config->item('theme') . 'header');


?>

<h2><?php echo $title; ?></h2>


<?php foreach ($tags as $tag): ?>

        <h3><?php echo $tag['title']; ?></h3>
        <div class="main">
                <?php echo $tag['text']; ?>
        </div>
        <p><a href="<?php echo base_url('pics/view/'.$tag['slug']); ?>">View pics</a></p>

<?php endforeach;

$this->load->view($this->config->item('theme') . 'footer');

?>
