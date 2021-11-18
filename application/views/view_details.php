<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<a href="http://localhost/CSC400/index.php/Home/landing" class='link-primary'>Return to Hompage</a>
   <table>
       <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 m-5 g-3">
           <?php 
            foreach($data['data'] as $row){
                echo '
                <div class="col" style="width: 400px">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <h5>'.$row->FacultyFirstName.', '.$row->FacultyLastName.'</h5>
                <p class="card-text">'.$row->FacultyEmailAddress.'</p>
                <p class="text-dark card-text fw-bold">'.$row->FacultyWebsite.'</p>
                <p class="text-dark card-text fw-bold">'.$row->FacultyGender.'</p>
                </div>
                </div>
                ';
            }
           ?>
       </div>
   </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>