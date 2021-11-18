
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SCSU Faculty KnowledgeBase Home</title>
  
    <style>
    /*
 * Globals
 */

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritance from `body` */
  background-color: #fff;
  border: .05rem solid #fff;
}


/*
 * Base structure
 */

html,
body {
  height: 100%;
  background: #FC466B;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3F5EFB, #FC466B);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3F5EFB, #FC466B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-pack: center;
  -webkit-box-pack: center;
  justify-content: center;
  color: #fff;
  /*text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
  box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5); */
}

.cover-container {
  max-width: 42em;
}


/*
 * Header
 */
.masthead {
  margin-bottom: 2rem;
}

.masthead-brand {
  margin-bottom: 0;
}

.nav-masthead .nav-link {
  padding: .25rem 0;
  font-weight: 700;
  color: rgba(255, 255, 255, .5);
  background-color: transparent;
  border-bottom: .25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
  border-bottom-color: rgba(255, 255, 255, .25);
}

.nav-masthead .nav-link + .nav-link {
  margin-left: 1rem;
}

.nav-masthead .active {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 48em) {
  .masthead-brand {
    float: left;
  }
  .nav-masthead {
    float: right;
  }
}


/*
 * Cover
 */
.cover {
  padding: 0 1.5rem;
}
.cover .btn-lg {
  padding: .75rem 1.25rem;
  font-weight: 700;
}


/*
 * Footer
 */
.mastfoot {
  color: rgba(255, 255, 255, .5);
}
    </style>
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Faculty KnowledgeBase</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="../Login/signout">Logout</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h3 class="text-center fw-bold text-light">Welcome back, <?php echo $_SESSION['email'];?></h3>
        <p class="cover-heading">Project Overview By Dr. Zheni Wang</p>
            <iframe src="http://www.youtube.com/embed/iV6ZOJy5jaw"
            width="560" height="315" frameborder="0" allowfullscreen class="shadow-lg p-3 mb-5 bg-white rounded"></iframe>
      </main>
      <div class="container-fluid shadow-lg p-3 mb-5 bg-dark rounded"style="width:1000px;">
      <table id="data" class="table table-striped table-bordered" style="width:1000px;">
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
      <thead class="bg-primary text-white fw-bold">
      <th>Faculty Email</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last name</th>
      <th>Faculty Website</th>
      <th>Gender</th>
      <th>Details</th>
    </thead>
    <?php 
        foreach($records['data'] as $row){
            echo '<tbody class="bg-light text-dark">
                <td>'.$row->FacultyEmailAddress.'</td>
                <td>'.$row->FacultyFirstName.'</td>
                <td>'.$row->FacultyMiddleName.'</td>
                <td>'.$row->FacultyLastName.'</td>
                <td> <a class="link-primary" href="'.$row->FacultyWebsite.'">'.$row->FacultyWebsite.'</a></td>
                <td>'.$row->FacultyGender.'</td>
                <td><a href="view_details/'.$row->FacultyEmailAddress.'" class="btn btn-primary">View Details</a></td>
            </tbody>
            ';
        }
    ?>
  </table>
      </div>
      <footer class="mastfoot mt-auto">
        <div class="inner">
        </div>
      </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

   
   <script>

$(document).ready( function () {
   $('#data').DataTable();} )


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </body>