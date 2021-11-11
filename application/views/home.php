
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SCSU Faculty KnowledgeBase Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
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
      <div class="container-fluid shadow-lg p-3 mb-5 bg-dark rounded">
      <table id="data" class="table table-striped table-bordered">
      <thead class="bg-primary text-white fw-bold">
      <th>School</th>
      <th>Class</th>
      <th>Date Enrolled</th>
    </thead>
    <?php 
        foreach($records['data'] as $row){
            echo '<tbody class="bg-dark text-white">
                <td>'.$row->school.'</td>
                <td>'.$row->class.'</td>
                <td>'.$row->enrolled.'</td>
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
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
        <script>
$(function (){
  $('#data').DataTable({
    scrollY: 400,
    processing: true,
    paging:true,
    searching: true,
    responsive: true,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
     color: 'white',
     stateSave: true,
     buttons: {
        buttons: [ 'copy', 'csv', 'excel' ]
    }     /*
     s stores state information such as pagination position, 
     display length, filtering and sorting. 
     When stateSave is active and the end user reloads the 
     page the table's state will be altered 
     to match what they had previously set up
      */
  });
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
      </body>