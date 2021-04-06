<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="site ooficiel..." /> <!--ce qui saffiche sur la barre de recherche de google-->

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/27e5e9f5bc.js" crossorigin="anonymous"></script> <!--pour avoir les log des boutons-->
    <link rel="icon" type="image/png" sizes="32x32" href="images/Cyberpink Logo.svg">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="resources/css/cyberpink.css">
    


    <title> CYBER PINK </title>


  </head>
  <body>        
        <!--*************** NavBar ***************-->
        <x-navbar/>
        <!--*************** Home ***************-->
        <div class="container-fluid " id="home">
            <div class="row">
                <div class="col-md-12 col-12">
                   <img src="resources/images/Cyberpink Logo.svg" class="logocyber">
                </div>
                <div class="col-md-12 col-12">
                    <div class="row">
                        <div class="col-md-4 col-12 btn1">           
                            <a href="{{url('workshop')}}" class="btn"> REGISTER FOR THE WORKSHOP</a>
                        </div>
                        <div class="col-md-4 col-12 btn2">
                            <a href="{{url('hack')}}" class="btn"> REGISTER FOR THE HACKATHON</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--*************** About the Event ***************-->
        <div class="container-fluid" id="about"> 
            <div class="row">
                <div class="col-md-1 offset-md-5 border-top" style=" border-color: #2b369e ; height: 5%; margin-top: 5%; width: 3%; margin-left: 45%; margin-bottom: 5%;"></div>
                <div class="col-lg-12">
                    <h1 class="soustitle">ABOUT THE EVENT</h1>
                    <p class="textabout">A unique two-in-one opportunity offering both a hackathon and a series of technical workshops, giving participants the chance to develop, learn new skills and use them to solve real life problems all while meeting amazing like-minded individuals and widening their networks. An opportunity not to be missed!                     </p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-12">
                          <img src="resources/images/hackathon.png" class="logo">
                            <p style="    font-family: 'Source Code Pro Medium';color: rgba(255, 255, 255, 0.7); font-size: 1.5em; text-align: center; margin-top: 2%;">hackathon</p> 
                        </div>
                        <div class="col-md-6 col-12">
                          <img src="resources/images/training.svg" style=" height: 50%;" class="logo">
                          <p style="font-family: 'Source Code Pro Medium';color: rgba(255, 255, 255, 0.7); font-size: 1.5em;text-align: center;margin-top: 5%;">workshop</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 offset-md-5 border-top" style=" border-color: #2b369e ; height: 5%; margin-top: 5%; width: 3%; margin-left: 45%;margin-bottom: 5%;"></div>
            </div>
        </div>
       <!--*************** Gallerie ***************-->
       <div class="container" id="gallerie">
           <div class="row">
              <div class="col-md-12">
                <h1 class="soustitle">Gallery</h1>
              </div>
              <div class="col-md-12" style="margin-top: 10%; margin-bottom: 5%;">
                <div class="row">
                  <div class="col-md-1 col-1 border-top" style=" height: 5%; margin-top: 4%; width: 3%;"></div>
                  <div class="col-md-3 col-3">
                    <p class="title">workshop</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <img class="pict" src="resources/images/gallerie.png">
                  </div>
                  <div class="col-md-6">
                    <p class="textgallerie">Special training sessions in which participants can truly develop their technical skills. </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10%;">
                <div class="row">
                  <div class="col-md-6">
                    <img class="pict" src="resources/images/photo2.png">
                  </div>
                  <div class="col-md-6">
                    <p class="textgallerie">Learning how to create a digital identity and web support using tools such as: HTML, CSS, and PHP.                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10%; margin-bottom: 5%;"> 
                <div class="row">
                  <div class="col-md-1 col-1 border-top" style=" height: 5%; margin-top: 4%; width: 3%;"></div>
                  <div class="col-md-3 col-3">
                    <p class="title">hackathon</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <img class="pict" src="resources/images/photo3.png">
                  </div>
                  <div class="col-md-6">
                    <p class="textgallerie">A tech marathon of 3 days and 2 nights devoted to the development of technological solutions to concrete problems encountered by companies.   </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10%;">
                <div class="row">
                  <div class="col-md-6">
                    <img class="pict" src="resources/images/photo1.png">
                  </div>
                  <div class="col-md-6">
                    <p class="textgallerie">Encouraging women in tech to showcase their talents to the world.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-1 offset-md-5 border-top" style=" border-color: #2b369e ; height: 5%; margin-top: 5%; width: 3%; margin-left: 45%; padding-bottom: 5%;"></div>
           </div>
        </div>
        <!--*************** Sponsor ***************-->
        <div class="container-fluid" id="sponsor">
          <div class="row">
            <div class="col-md-12">
              <h1 class="soustitle">OUR SPONSORS </h1>
            </div>
            <div class="col-md-12" style="background-color: #2b369e; margin-top: 10%; margin-bottom: 2%;">
              <div class="row">
                 <div class="col-md-2 col-12"><img src="resources/images/1.jpg" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/3.png" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/4.PNG" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/5.png" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/6.png" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/9.png" class="logosponsor"></div>




              </div>
            </div>
            <div class="col-md-12" style="background-color: #2b369e;">
              <div class="row">
                <div class="col-md-2 offset-md-3 col-12"><img src="resources/images/7.png" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/8.png" class="logosponsor"></div>
                <div class="col-md-2 col-12"><img src="resources/images/10.png" class="logosponsor"></div>


              </div>
            </div>
            <div class="col-md-1 offset-md-5 border-top" style=" border-color: #2b369e ; height: 5%; margin-top: 5%; width: 3%; margin-left: 45%;"></div>
          </div>
        </div>
        <!--*************** Become sponsor/organizer ***************-->
        <div class="container" id="become">
            @if ($errors->any())
                <div class="alert alert-danger" id="errors" role="alert">
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="row">
            <div class="col-md-6 form" style="margin-top:0%;">
              <h1 class="soustitle" style="text-align: center; font-size: 2.75em;">BECOME A SPONSOR</h1>
              <P class="textsponsor">Want to learn more about how your company can become a partner?
                Fill out the form and a member of our team will reach out to you!         </P>

            <form method="POST" action="{{ url('sponsorCreate') }}">
                @csrf
              <div class="mb-3" style="padding-top: 21.5%;">
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="EMAIL ADDRESS" style="height: 80px;">
              </div>
              <div class="mb-3">
                <textarea name="letter" class="form-control" id="exampleFormControlTextarea1" rows="13" placeholder="LETTER"></textarea>
              </div>
              <div class="col-md-6">
               <button class="btn3"type="submit"> SUBMIT </button>
              </div>
            </form>
            </div>
            <div class="col-md-6 form" style="margin-top:0%;">
              <h1 class="soustitle" style="text-align: center; font-size: 2.75em;">BECOME AN ORGANIZER</h1>
              <P class="textsponsor"> Become an organizer
                Are you a club or association that would like to organize Cyber Pink in your region? All you have to do is fill in the form to become part of the adventure</P>
                <form method="POST" action="{{ url('organizerCreate') }}">
                  @csrf
                  <div class="mb-3" style="padding-top: 15%;">
                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="EMAIL ADDRESS" style="height: 80px;">
                  </div>
                  <div class="mb-3" style="padding-top: 15%;">
                    <input name="university" type="university" class="form-control" id="exampleFormControlInput1" placeholder="UNIVERSITY" style="height: 80px;">
                  </div>
                  <div class="mb-3" style="padding-top: 15%; margin-bottom: 0%;">
                    <input name="club" type="club" class="form-control" id="exampleFormControlInput1" placeholder="CLUB" style="height: 80px;margin-bottom: 0%;">
                  </div>
                  <div class="col-md-6">
                    <button class="btn3"type="submit"> SUBMIT </button>
                  </div>
                </form>
            </div>
            <div class="col-md-1 offset-md-5 border-top" style=" border-color: #2b369e ; height: 5%; margin-top: 10%; width: 3%; margin-left: 45%; margin-bottom: 5%"></div>
          </div>
        </div>
        <!--*************** Contact us  ***************-->
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
  </body>
</html>