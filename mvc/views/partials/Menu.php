<h2 class="nav-tab-wrapper">
<?php foreach( $GLOBALS['tabs'] as $tab ): ?>
	<?php $active = ( $GLOBALS['tab'] === $tab ) ? ' nav-tab-active' : '' ?>
	<a class="nav-tab<?=$active;?>" href="<?=add_query_arg( 'tab', $tab );?>"><?=$tab;?></a>
<?php endforeach;?>
</h2>