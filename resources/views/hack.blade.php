<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="site ooficiel..." />
    <!--ce qui saffiche sur la barre de recherche de google-->

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/27e5e9f5bc.js" crossorigin="anonymous"></script>
    <!--pour avoir les log des boutons-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('resources/images/Cyberpink Logo.svg')}}">
    <link rel="stylesheet" href="{{url('resources/css/hack.css')}}">



    <title> HACKATHON </title>


</head>

<body>
    <div class="container-fluid" id="registration">
        <div class="row">
            <!--*****************partie gauche*******************-->
            <div class="col-lg-6 col-12 gauche">
            </div>
            <!--*****************partie gauche*******************-->
            <div class="col-lg-6 col-12">
                <div class="row">
                    <div class="col-lg-3 col-12 btn1">
                        <a href="#" class="btn">HACKATHON</a>
                    </div>
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-5" id="errors" role="alert">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                        <form id="regForm" method="POST" enctype="multipart/form-data" action="{{url('createHacker')}}">
                            @csrf
                            <!--step1-->
                            <div class="tab">
                                <div class="mb-3">
                                    <input name="fullname" type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="FULL NAME" style="height: 50px;">
                                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="EMAIL" style="height: 50px;">
                                    <input name="phone" type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="PHONE NUMBER" style="height: 50px;">
                                    <input name="skills" type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="SKILLS (use , to separate between them)" style="height: 50px;">
                                    <input name="university" type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="UNIVERSITY" style="height: 50px;">
                                    <select name="study_level" class="custom-select">
                                        <option value="">Level</option>
                                        <option value="licence">Licence</option>
                                        <option value="master">Master</option>
                                        <option value="doctorat">Doctorat</option>
                                        <option value="other">Other</option>
                                     </select>
                                     
                                </div>
                            </div>
                            <!--step2-->
                            <div class="tab">
                                <div class="mb-3">
                                    <label for="Nom"
                                        style="font-family: 'Source Code Pro Medium';font-size: 1.5em; color: rgba(255, 255, 255, 0.7);">HAVE
                                        YOU EVER PARTICIPATED IN HACKATHON?</label>
                                    <br> <br>
                                    <input class="vous" type="radio" value="true" name="participated" id="adherent" /><span
                                        style="font-family: 'Source Code Pro Medium';font-size: 1.5em; color: rgba(255, 255, 255, 0.7);">
                                        YES </span>
                                    <input class="vous" type="radio" value="false" name="participated" id="nonadherent" checked /><span
                                        style="font-family: 'Source Code Pro Medium';font-size: 1.5em; color: rgba(255, 255, 255, 0.7);">
                                        NO
                                    </span>
                                    <br>
                                    <div id="sarah">
                                        <input name="particiaptions" type="number" placeholder="HOW MUCH TIME?" style="height: 50px; "
                                            required="false" value="0">
                                    </div>
                                    <input name="linked_in" type="url" class="form-control linkedinInput" id="exampleFormControlInput1"
                                        placeholder="LINKEDIN" style="height: 50px;">
                                </div>
                            </div>
                            <!--step3-->
                            <div class="tab">
                                <div class="mb-3">
                                    <input name="github"  type="url" class="form-control githubInput" id="exampleFormControlInput1"
                                        placeholder="GITHUB LINK " style="height: 50px;">
                                    <select name="size" class="custom-select">
                                        <option value="">T-SHIRT size</option>
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="xl">XL</option>
                                        <option value="xxl">XXL</option>
                                        <option value="3xl">3XL</option>
                                      </select>
                                    <label id="custom-button">
                                        <span id="submit"
                                            style="font-family: 'Montserrat'; font-weight: 500;color: #546D83">
                                            SUBMIT YOUR PHOTO
                                        </span>
                                        <span id="done"
                                            style="font-family: 'Montserrat'; font-weight: 500;color: #546D83" hidden>
                                            DONE
                                        </span>
                                        <input type="file" name="image" id="fI" accept="image/*" id="custom-button" hidden>
                                    </label>
                                </div>
                            </div>
                            <!--step4-->
                            <div class="tab">
                                <div class="mb-3">
                                    <label for="Nom"
                                        style="font-family: 'Source Code Pro Medium';font-size: 1.5em; color: rgba(255, 255, 255, 0.7);">
                                        WILL YOU BE ABLE TO STAY OVERNIGHT FOR 3 DAY HACKATHON? </label>
                                        <br/>
                                    <input class="vous" type="radio" name="stay_at_night" value="true" id="yes" />
                                    <span style="font-family: 'Source Code Pro Medium';font-size: 1.5em; color: rgba(255, 255, 255, 0.7);"> YES </span>
                                   
                                    <input class="vous" type="radio" name="stay_at_night" value="false" id="no" />
                                    <span style="font-family: 'Source Code Pro Medium';font-size: 1.5em; color: rgba(255, 255, 255, 0.7);"> NO </span> 
                                    <input name="motivation" type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="MOTIVATION" style="height: 50px;">
                                </div>
                            </div>
                            <!--bouton-->
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button class="btn" type="button" id="prevBtn"
                                        onclick="nextPrev(-1)">Previous</button>
                                    <button class="btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                            <!-- cercles steps -->
                            <div style="text-align:left;margin-top:5px;">
                                <span class="step">1</span>
                                <span class="step">2</span>
                                <span class="step">3</span>
                                <span class="step">4</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <!-- steper form script -->
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    if ($(y).hasClass("linkedinInput") == false && $(y).hasClass("githubInput") == false) {
                        y[i].className += " invalid";
                        valid = false;
                        
                    }
                    // add an "invalid" class to the field:
                    // and set the current valid status to false
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        document.getElementById('fI').addEventListener('change', hide);

        function hide() {

            document.getElementById("submit").hidden = true;
            document.getElementById("done").hidden = false;

        }


    </script>

</body>

</html>