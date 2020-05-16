<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Educational</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Educational</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container bg-light my-4 mx-4">
        <div class="row d-flex justify-content-center">
        <h1 >Subject</h1>
        </div>
    <div class="row ">
    
        @foreach($data as $data)
        <div class="card mx-4 my-4 " data-id="{{$data->id}}">
            <div class="card-body">
            <h1>{{$data->subject}}</h1>
                <input type="hidden" name="idValue" value="{{$data->id}}">
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-12 label">
        <h2 class="fai"></h2>
        
    </div>
    <div class="col-md-12 chapter">
        </div>
    
   
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  </body>
  <script>
    $(document).ready(function(){
      $(".card").css("ackground-color", "gray");
        $(".card").click(function(event){
            let val = $(this).data("id");
            // console.log(val);
            $(".label").empty();
            $(".chapter").empty();
            // axios send data

            url = "/educational/"+val;
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                
                success: function(response) {
                    // console.log(typeof response);
                    response.forEach(function(element){
                        // console.log(element.id);
                    let temp = `<div id="fa${element.id}" >
                                    <div class="col-md-12 bg-primary  pull-left">
                                        <ul class="appe">
                                            <li data-label="${element.id}" ><h4>${element.name}</h4></li>
                                        </ul>
                                    </div>
                                </div>`;
                    $(".label").append(temp);
                    

                        // another function
                    });
                },
            });

        });

        //start
        $(".label").on("click",".appe li",function(e){         
                  // $('#accord').empty();
                  e.preventDefault();
                  $(".chapter").empty();
                    var label = $(this).data("label");

                    var id = $(this).attr('id')
                   
                    url = "/label/"+label;
                    $.ajax({
                        type: 'GET',
                        url: url,
                        dataType: 'json',
                        success:function(response){
                            response.forEach(function(ele){
                                
                              let chapter = `
                              <div id="accord" class="bg-secondary">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                  ${ele.name}
                                </button>
    
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                      ${ele.content}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Video</button>
                              <div id="myModal" class="modal fade" role="dialog">                        
                              <div class="modal-dialog modal-lg">
                                 Modal content
                                <div class="modal-content>
                                  <div class="modal-header mx-2">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Chapter 1</h4>
                                  </div>
                                  <div class="modal-body">
                                      <video width="100%" controls>
                                        <source src="movie.mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                          Your browser does not support the video tag.                                    
                                      </video>
                                    </div>                                  
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" disabled>Download</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                              </div>
                            </div>
                          </div>`;
                          $(".chapter").data("label",id).append(chapter);
                            }) ;
                            
                            
                        }
                    });
                    // end of function
                    e.stopImmediatePropagation();
                });
        //end
        
    });
  </script>
</html>











 