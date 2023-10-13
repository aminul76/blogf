<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Site</title>

    <!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Include DataTables CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

    <!-- Include DataTables Buttons CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <!-- Include Bootstrap 4 CSS and JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Include Font Awesome (note: this line seems to be redundant, as it's already included above) -->
    <script src="https://use.fontawesome.com/ec9cced8ab.js"></script>

    <!-- Include Summernote CSS and JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @yield('css')
</head>
<body>
    <!-- Your HTML content here -->

    <div class="d-flex">
        <div class="flex-shrink-0">
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li> <a href="#" class="nav-link py-3 border-bottom"> <i class="fa fa-dashboard fa-2x"></i> <small></small> </a> </li>
                <li> <a href="{{route('posts.index')}}" class="nav-link py-3 border-bottom"> <i class="fa fa-pencil fa-2x"></i> <small></small> </a> </li>
                <li> <a href="{{route('categories.index')}}" class="nav-link py-3 border-bottom"> <i class="fa fa-tags fa-2x"></i> <small></small> </a> </li>
                <li> <a href="{{route('website-settings.edit')}}" class="nav-link py-3 border-bottom"> <i class="fa fa-cog fa-2x"></i> <small></small> </a> </li>
               

                <li> <a href="{{route('changepassword')}}" class="nav-link py-3 border-bottom">  <i class="fa fa-key fa-2x" aria-hidden="true"></i> <small></small> </a> </li>



                <li> <a href="{{route('plugins.index')}}" class="nav-link py-3 border-bottom"> <i class="fa fa-gavel fa-2x"></i> <small></small> </a> </li>



                {{-- <li> <a href="" class="nav-link py-3 border-bottom"> <i class="fa fa-star"></i> <small></small> </a> </li>
                <li> <a href="" class="nav-link py-3 border-bottom"> <i class="fa fa-bookmark"></i> <small></small> </a> </li>
                <li> <a href="" class="nav-link py-3 border-bottom"> <i class="fa fa-bookmark"></i> <small></small> </a> </li> --}}
            

                <li> <a   href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"  class="nav-link py-3 border-bottom"> <i class="fa fa-sign-out fa-2x"></i> <small></small>  </a>  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form></li>

              
            </ul>
        </div>
       
        <div class="flex-grow-1 ms-3 p-3">
           @yield('content')
        </div>
      </div>
    

    <!-- Your scripts here -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );

            $('#summernote').summernote();
        });
    </script>

    @yield('scripts')
</body>
</html>
