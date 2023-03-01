<!DOCTYPE html>
<html>
<head>
	<title>DataTable with SilverStripe-2 Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/datatables.min.css"/>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/datatables.min.js"></script>
	
</head>
<body>
	<table id="buku-table" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Class Name</th>
				<th>ID</th>
				<th>Last Edited</th>
				<th>Created</th>
				<th>Title</th>
				<th>Author</th>
				<th>Published Date</th>
				<th>Publisher</th>
			</tr>
		</thead>
	</table>

    <script type="text/javascript">
		$(document).ready(function() {
			$('#buku-table').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "data.php",
					"type": "POST"
				},
				"columns": [
					{ "data": "ClassName" },
					{ "data": "ID" },
					{ "data": "LastEdited" },
					{ "data": "Created" },
					{ "data": "Title" },
					{ "data": "Author" },
					{ "data": "PublishedDate" },
					{ "data": "Publisher" }
				]
			});
		});
	</script>
    <script>function reloadTable() {
  var table = $('#example').DataTable();
  table.ajax.reload();
}
</script>

</body>
</html>
