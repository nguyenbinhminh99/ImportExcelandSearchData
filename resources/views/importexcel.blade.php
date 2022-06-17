<!DOCTYPE html>
<html>
<head>
    <title>Import Export Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Excel File
        </div>
        <div class="card-body">
            <form action="{{url('import-csv')}}"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" class="form-control" accept=".xlsx">
                <br>
                <button class="btn btn-success">Import Data</button>
            </form>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
        {{session('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h3 class="text-center text-danger">Autocomplete Search Box!</h3><hr>
            <div class="form-group">
                <h4>Type by id, name!</h4>
                <input type="text" name="search" id="search" placeholder="Enter search name or id" class="form-control" onfocus="this.value=''">
            </div>
            <div id="search_list"></div>
        </div>
        <div class="col-lg-3"></div>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query= $(this).val();
            $.ajax({
                url:"search",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    $('#search_list').html(data);
                }
            });
            //end of ajax call
        });
    });
</script>

</body>
</html>
