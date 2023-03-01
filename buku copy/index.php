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
<div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12">
        <h1>Data Buku</h1>
      </div>  
    </div>
    <hr>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
				<th scope="col">Class Name</th>
				<th scope="col">ID</th>
				<th scope="col">Last Edited</th>
				<th scope="col">Created</th>
				<th scope="col">Title</th>
				<th scope="col">Author</th>
				<th scope="col">Published Date</th>
				<th scope="col">Publisher</th>
              </tr>
            </thead>
            <tbody>
              <!-- List Data Menggunakan DataTable -->              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr>
  </div>

    <script type="text/javascript">
		$(document).ready(function() {
		$('.table').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "data.php",
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
		} );
		} );

	</script>
   

</body>
</html>
