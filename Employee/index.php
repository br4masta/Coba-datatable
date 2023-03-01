  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<body>
  </head>
  <body>

<div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12">
        <h1>Data Kontak</h1>
      </div>  
    </div>
    <hr>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Position</th>
                <th scope="col">Office</th>
                <th scope="col">Start date</th>
                <th scope="col">Salary</th>
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
 
<script>$(document).ready(function() {
    $('.table').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "http://localhost/Employee/Employee/data.php",
      "columns": [
        { "data": "id" },
        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "position" },
        { "data": "office" },
        { "data": "start_date" },
        { "data": "salary" }
      ]
    } );
  } );
  </script>
  </body>
  </html>
