<?php
foreach ($scripts['foot'] as $file) {
	$url = starts_with($file, 'http') ? $file : base_url($file);
	echo "<script src='$url'></script>" . PHP_EOL;
}
?>

<?php // Google Analytics 
?>
<?php $this->load->view('_partials/ga') ?>
<script type="text/javascript">

</script>
</body>

</html>