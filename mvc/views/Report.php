<?php require 'partials/Header.php'; ?>
<?php require 'partials/Menu.php'; ?>
<textarea style="width: 95%; height: 500px; resize: vertical;">
<?php echo json_encode( $data, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );?>
</textarea>
<?php require 'partials/Footer.php'; ?>
