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
    <link rel="stylesheet" href="{{url('resources/css/workshop.css')}}">
    


    <title> WORKSHOP </title>


  </head>
  <body>
      <div class="container-fluid" id="registration">
          <form method="POST" action="{{ url('createParticipant') }}">
            @csrf
              @if ($errors->any())
                <div class="alert alert-danger mt-5" id="errors" role="alert">
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
            <div class="row">
                <!--*****************partie gauche*******************-->
                <div class="col-md-6 col-12 gauche">

                </div>
                <!--*****************partie gauche*******************-->
                <div class="col-md-6 col-12 droite">
                    <div class="row">
                      <div class="col-md-3 col-12 btn1">           
                          <a href="#" class="btn">WORKSHOP</a>
                      </div>
                      <div class="col-md-6 col-12 form">
                          <div class="mb-3" style="padding-top: 20%;">
                              <input name="fullname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="FULL NAME" style="height: 70px;">
                          </div>
                      </div>
                      <div class="col-md-6 col-12 form">
                          <div class="mb-3" style="padding-top: 20%;">
                              <input name="birthdate" type="date" class="form-control" id="exampleFormControlInput1" placeholder="DATE OF BIRTH" style="height: 70px;">
                          </div>
                      </div>
                      <div class="col-md-6 col-12 form">
                          <div class="mb-3" style="padding-top: 10%;">
                              <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="EMAIL" style="height: 70px;">
                          </div>
                      </div>
                      <div class="col-md-6 col-12 form">
                          <div class="mb-3" style="padding-top: 10%;">
                              <input name="phone" value="0" type="text" class="form-control" id="exampleFormControlInput1" placeholder="PHONE NUMBER" style="height: 70px;">
                          </div>
                      </div>
                      <div class="col-md-6 col-12 form">
                          <div class="mb-3" style="padding-top: 10%;">
                              <input name="motivation" type="text" class="form-control" id="exampleFormControlInput1" placeholder="MOTIVATION" style="height: 70px;">
                          </div>
                      </div>
                      <div class="col-md-6 col-12 form">
                          <div class="mb-3" style="padding-top: 10%;">
                              <select name="size" class="custom-select">
                                <option value="">T-SHIRT size</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="3xl">3XL</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4 offset-md-8 col-12">
                          <button class="btn3"type="submit"> SUBMIT </button>
                      </div>
                      
                    </div>
                </div>
            </div>
          </form>
      </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>