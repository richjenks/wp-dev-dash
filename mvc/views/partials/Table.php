<table>
	<?php if ( isset( $table['caption'] ) ): ?>
		<caption><?=$table['caption'];?></caption>
	<?php endif;?>
	<?php foreach ( $table['data'] as $key => $val ): ?>
		<tr>
			<th><?=$key;?></th>
			<td><?=RichJenks\WPServerInfo\Helpers\View::prettify( $val );?></td>
		</tr>
	<?php endforeach; ?>
</table>
