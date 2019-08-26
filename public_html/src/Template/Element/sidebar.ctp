<!-- Sidebar -->
<?= $this->Html->css('Elements/sidebar'); ?>

<div id="sidebar" class="position-absolute list-group list-group-flush border-right">
    <?
        foreach ($sidebar_items as $item)
        {
            $name  = $item['displayName'];
            $url   = $this->Url
                          ->build($item['link']);
            $class = $item['class'] ?? '';

            echo '
                <a href="'.$url.'" class="list-group-item list-group-item-action '.$class.'">'.$name.'</a>
            ';
        }
    ?>
</div>
