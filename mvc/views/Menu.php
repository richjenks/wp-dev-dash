<?php require __DIR__ . DS . 'partials' . DS . 'Header.php';?>
<h2 class="nav-tab-wrapper">
<?php foreach( $data['tabs'] as $tab ): ?>
	<?php $active = ( $data['current'] === $tab ) ? ' nav-tab-active' : '' ?>
	<a class="nav-tab<?=$active;?>" href="<?=add_query_arg( 'tab', $tab );?>"><?=$tab;?></a>
<?php endforeach;?>
</h2>
<?php require __DIR__ . DS . 'partials' . DS . 'Footer.php';?>