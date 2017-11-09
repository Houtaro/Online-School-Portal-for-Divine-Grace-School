<footer class="main-footer text-center">
	<strong>&copy 2018 School Portal . All Rights Reserved</strong>
</footer>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/cbpFWTabs.js"></script>
<script src="js/datatables/jquery.dataTables.js"></script>
<script src="js/datatables/dataTables.bootstrap.js"></script>
<script src="js/app.js"></script>
<script>
	$(document).ready(function(){
		$('#example').dataTable({
			"sSearch": '<span class="fa fa-search form-control-feedback"></span>'
		});
		$('div.dataTables_filter input').attr('placeholder', 'Search...');
	});

	$('[data-toggle="tooltip"]').tooltip(); 
</script>