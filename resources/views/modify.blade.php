<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Cyber pink" /> <!--ce qui saffiche sur la barre de recherche de google-->

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/27e5e9f5bc.js" crossorigin="anonymous"></script> <!--pour avoir les log des boutons-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('resources/images/Cyberpink Logo.svg')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{url('resources/css/cyberpink.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireStyles
    <title>CYBER PINK - Modify your subsubmission </title>
    <style type="text/css">
      .submitInput {
        background-color: transparent !important;
        height: 80px !important;
        font-size: 28px !important;
        color:white !important;
        border: 3px solid #2b369e !important;
      }
      .mmbr {
        background-color: #f3f3f3;
        color: black;
        border-radius: 3px;
      }
      .searchresults {
        background-color: white !important;
        color:black;
        border-radius: 0px 0px 4px 4px;
        border-bottom: 3px solid #2b369e !important;
        border-left: 3px solid #2b369e !important;
        border-right: 3px solid #2b369e !important;
      }
      .badge {
        background-color: #cfcfcf;
      }
      .selceted {
        background-color: #bcedb9 !important;
      }
    </style>

  </head>
  <body>        
        <!--*************** NavBar ***************-->
        <x-navbar/>
        <!--*************** Home ***************-->

        <!--*************** About the Event ***************-->
        <div class="container-fluid" id="about"> 
            <div class="row">
                <div class="col-md-1 offset-md-5 " style=" height: 5%; margin-top: 5%; width: 3%; margin-left: 45%; margin-bottom: 5%;"></div>
                <div class="col-lg-12">
                  <h1 class="soustitle">Modify your subsubmission</h1>
                </div>
                <div class="col-md-1 offset-md-5 border-top" style=" border-color: #2b369e ; height: 5%; margin-top: 5%; width: 3%; margin-left: 45%; margin-bottom: 5%;"></div>
            </div>  
        </div>
        <div class="container">
          @livewire("modify", ["link" => $link])
        </div>

            <form method="post" action="{{ url('contact') }}">
              <div class="container" id="contact">
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="soustitle"> CONTACT US </h1>
                  </div>
                    @csrf
                    <div class="col-md-6 form">
                      <div class="mb-3" style="padding-top: 5%;" >
                        <input name="fullname" type="name" class="form-control" id="exampleFormControlInput1" placeholder="FULL NAME" style="height: 80px;">
                      </div>
                      <div class="mb-3" style="padding-top: 5%;">
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="EMAIL ADDRESS" style="height: 80px;">
                      </div>
                    </div>
                    <div class="col-md-6 form">
                      <div class="mb-3" style="padding-top: 5%;">
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="9" placeholder="MESSAGE"></textarea>
                      </div>
                      <div class="col-md-6">
                        <button class="btn3"type="submit" > SUBMIT </button>
                      </div>
                    </div>
                  
                  <div class="col-lg-12 reseau">
                    <a href="https://www.instagram.com/cyberpink.celec/?fbclid=IwAR2tDhB_ky_PuD-91KFptDteifTHbI_ehAHKzh32r95J8F38HZrb9yk6-3k" target="-blank" class="rs"><span style="color: white;"><i class="fab fa-instagram"></i></span></a>
                    <a href="https://www.facebook.com/cyberpink.celec" class="rs"><span style="color: white;"><i class="fab fa-facebook"  target="-blank"></i></span></a>
                    <a href="https://www.linkedin.com/company/printpic/?fbclid=IwAR3gUeKwafisQmS6BaCmwPCL8CkzS8ldBDTP91JuY_FT4nj4327Jn0Nygfs"  target="-blank" class="rs"><span style="color: white;"><i class="fab fa-linkedin-in"></i></span></a>
                  </div>
                </div>
              </div>
            </form>


     <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script type="text/javascript">
          @if (session('sponsorCreated'))
              toastr.success('{{session("sponsorCreated")}}', null,{timeOut: 50000, "closeButton": true, "progressBar": true});
          @endif
  </script>
  @livewireScripts
  @stack("scripts")
  </body>
</html>