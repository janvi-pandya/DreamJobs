<script type="text/javascript">
$('body,document').keyup(function(e){
	if(e.ctrlkey && e.keyCode==80)
		<?php
			header("location=report.php");
		?>
}
});
</script>