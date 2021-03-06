<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="POST">
      <div class="input-group mb-3">
  <div class="form-outline">
    <input type="search" id="form1"  style="border-radius: 25px; width: 500px; height: 40px;" placeholder="Search anything..." name="search" class="form-control" />
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="fas fa-search"></i>
    Search
  </button>
</div>
      </div>
</form>
<a href="landing" class='link-primary'>Return to Hompage</a>


<div class="responsive">
<table class="table table-hover shadow-lg p-3 mb-5 bg-body rounded" style="width: 1000px;">
<thead class="bg-primary text-white">
<th>Faculty Email</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Last name</th>
<th>Faculty Website</th>
<th>Gender</th>
<th>Detailed Results</th>
</thead>
<?php 
if(empty($results['data'])){
    echo 'No results matched your search';
}
else{


foreach($results['data'] as $row){
 echo '
<tbody class="bg-white text-dark fw-bold">
<tr>
<td>'.$row->FacultyEmailAddress.'</td>
<td>'.$row->FacultyFirstName.'</td>
<td>'.$row->FacultyMiddleName.'</td>
<td>'.$row->FacultyLastName.'</td>
<td>'.$row->FacultyWebsite.'</td>
<td>'.$row->FacultyGender.'</td>
<td><a href="view_details/'.$row->FacultyEmailAddress.'" class="btn btn-primary">View Details</a></td>
</tr>
</tbody>
';
}
}
?>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
