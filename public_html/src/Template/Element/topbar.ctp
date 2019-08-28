<!-- Topbar -->
<?= $this->Html->css('Elements/topbar'); ?>

<nav id="topbar" class="navbar navbar-light bg-light d-block">
    <div class="float-right">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Users', 'action' => 'logout']); ?>"><?= __('Logout'); ?></a>
    </div>
</nav>
