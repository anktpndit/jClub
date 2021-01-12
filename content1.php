    <!-- Landing page, search box and login -->
    <section id="LandingPage" class="demo">
        <img src="Logo/logotrans.png" width="400" alt="logo-jclub" class="LandingPageLogo">
        <!--Search Bar-->
        <?php require 'includes/server_script_search_club-in.php' ?>
        <div class="row">
            <div class="col-sm-5 mx-auto">
                <form action="searchpage.php" method="post">
                    <div class="p-1 bg-warning rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                            <input type="search" id="autocomplete" name="searchword" placeholder="Which club are you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" name="search" class="btn btn-link text-primary"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'noclub') {
                echo "<h6 style='color:red;text-align:center'>No clubs found</h6>";
            }
        }
        ?>
        <br>
        <section id="landingiconsid">
            <div class="landingpageicons">
                <div class="row" id="landingicons">
                    <div class="col-lg-2 col-md-4">
                        <img class="icons" src="icon/fellowship.png" alt="Care logo">
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <img class="icons" src="icon/fsh.png" alt="fellowship and others logo">
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <img class="icons" src="icon/iconArt.svg" alt="Art Club logo">
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <img class="icons" src="icon/iconDance.png" alt="Dance logo">
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <img class="icons" src="icon/iconFootball.png" alt="Football logo">
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <img class="icons" src="icon/iconMusicIns.svg" alt="Music logo">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <p class="landing-text">
                Welcome To jClub! A website built just for you. <br>
                Register, connect, and start your very own club with just a single click. <br>
                A perfect platform for managing your clubs.
            </p>
        </section>
        <a href="#review-section"><span></span></a>
    </section>
    <!-- End Landing page, search box and login  -->

    <!--COVID Warning-->
    <section class="covid">
        <div class="warned">
            <img class="warning-img lax" data-lax-preset="spinIn" src="Pictures/warn.png" alt="warning-img">
            <h6 class="warning-text">
                <h5 class="covi">COVID-19</h5>Warning! Due to current Corona Pandemic, it is mandatory that all
                personnel wear a
                face mask and practice social distancing. Also, all club activities must have less than 15 attendees.
            </h6>
            <img class="warning-img img2 lax" data-lax-preset="spinIn" src="Pictures/warn.png" alt="warning-img">
        </div>
    </section>

    <section id="clubs-des">
        <div class="row c-content">
            <div class="col-md-6 lax" data-lax-translate-x="300 0, 500 -100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <img class="sf1" src="Pictures/musicalBand_homepage.png" alt="arts_image">
            </div>
            <div class="col-md-6 p1 lax" data-lax-translate-x="300 0, 500 100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <center>
                    <h2 class="ph">Music</h2>
                </center>
                <p>jClub aims to make finding, registering, and managing the different Clubs at
                    Jacobs University easier and more convenient for both the students and the club members. A
                    user may either search for the name of an existing club or any key word corresponding to the
                    club that the user is interested in. In the first case, our web application displays
                    relevant information about the interested existing club. The displayed information includes
                    the name of the founder, name of the supervisor, number of active members, time and location
                    of meetings/gathering, and description of current projects.
                    jClub aims to make finding, registering, and managing the different Clubs at
                </p>
            </div>
        </div>
        <div class="row c-content">
            <div class="col-md-6 lax" data-lax-translate-x="300 0, 500 -100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <img class="sf2" src="Pictures/sf.png" alt="Fellowship">
            </div>
            <div class="col-md-6 p2 lax" data-lax-translate-x="300 0, 500 100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <center>
                    <h2 class="ph">Outreach & Fellowship</h2>
                </center>
                <p>jClub aims to make finding, registering, and managing the different Clubs at
                    Jacobs University easier and more convenient for both the students and the club members. A
                    user may either search for the name of an existing club or any key word corresponding to the
                    club that the user is interested in. In the first case, our web application displays
                    relevant information about the interested existing club. The displayed information includes
                    the name of the founder, name of the supervisor, number of active members, time and location
                    of meetings/gathering, and description of current projects.
                    jClub aims to make finding, registering, and managing the different Clubs at
                    Jacobs University easier and more convenient for both the students and the club members.
                </p>
            </div>
        </div>
        <div class="row c-content">
            <div class="col-md-6 lax" data-lax-translate-x="300 0, 500 -100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <img class="sf3" src="Pictures/sports.png" alt="arts_image">
            </div>
            <div class="col-md-6 p3 lax" data-lax-translate-x="300 0, 500 100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <center>
                    <h2 class="ph">Sports</h2>
                </center>
                <p>jClub aims to make finding, registering, and managing the different Clubs at
                    Jacobs University easier and more convenient for both the students and the club members. A
                    user may either search for the name of an existing club or any key word corresponding to the
                    club that the user is interested in. In the first case, our web application displays
                    relevant information about the interested existing club. The displayed information includes
                    the name of the founder, name of the supervisor, number of active members, time and location
                    of meetings/gathering, and description of current projects.
                    jClub aims to make finding, registering, and managing the different Clubs at
                </p>
            </div>
        </div>
        <div class="row c-content">
            <div class="col-md-6 lax" data-lax-translate-x="300 0, 500 -100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <img class="sf3" src="Pictures/dc.jpg" alt="arts_image">
            </div>
            <div class="col-md-6 p4 lax" data-lax-translate-x="300 0, 500 100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <center>
                    <h2 class="ph">Dance</h2>
                </center>
                <p>jClub aims to make finding, registering, and managing the different Clubs at
                    Jacobs University easier and more convenient for both the students and the club members. A
                    user may either search for the name of an existing club or any key word corresponding to the
                    club that the user is interested in. In the first case, our web application displays
                    relevant information about the interested existing club. The displayed information includes
                    the name of the founder, name of the supervisor, number of active members, time and location
                    of meetings/gathering, and description of current projects.
                    jClub aims to make finding, registering, and managing the different Clubs at
                </p>
            </div>
        </div>
        <div class="row c-content">
            <div class="col-md-6 lax" data-lax-translate-x="300 0, 500 -100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <img class="sf3" src="Pictures/oth2.jpg" alt="otherAct">
            </div>
            <div class="col-md-6 p4 lax" data-lax-translate-x="300 0, 500 100" data-lax-opacity="300 1, 500 0" data-lax-anchor="self">
                <center>
                    <h2 class="ph">Other Clubs</h2>
                </center>
                <p>jClub aims to make finding, registering, and managing the different Clubs at
                    Jacobs University easier and more convenient for both the students and the club members. A
                    user may either search for the name of an existing club or any key word corresponding to the
                    club that the user is interested in. In the first case, our web application displays
                    relevant information about the interested existing club. The displayed information includes
                    the name of the founder, name of the supervisor, number of active members, time and location
                    of meetings/gathering, and description of current projects.
                    jClub aims to make finding, registering, and managing the different Clubs at
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="review-section">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="big-heading">
                    <blockquote>Since jClub came around, my life has been so much easier! Now, I can just look up what
                        clubs are doing which activites, and just go
                        ahead an join them. Easy as that!</blockquote>
                </h3>
            </div>
            <div class="col-lg-6">
                <h3 class="big-headindg">
                    <blockquote>I use this app every day! If I have some free time and need something to do, I just look
                        at jClub
                        and see what my clubs are doing. Great concept!</blockquote><br>
                    </h>
            </div>
        </div>
    </section>

    <!-- FAQ  -->
    <section id="FAQ">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <!-- <h3 class="faq-header">FAQs:</h3> -->
                <div class="card">
                    <div class="card-header" id="hd1">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#coll1" aria-expanded="true" aria-controls="coll1">
                                <i class="fa fa-arrow-right"></i>
                                What is this website for?
                            </button>
                        </h2>
                    </div>

                    <div id="coll1" class="collapse" aria-labelledby="hd1" data-parent="#accordionExample">
                        <div class="card-body">
                            jClub aims to make finding, registering, and managing the different Clubs at
                            Jacobs University easier and more convenient for both the students and the club members. A
                            user may either search for the name of an existing club or any key word corresponding to the
                            club that the user is interested in. In the first case, our web application displays
                            relevant information about the interested existing club. The displayed information includes
                            the name of the founder, name of the supervisor, number of active members, time and location
                            of meetings/gathering, and description of current projects. In the latter, our web
                            application filters through the entered key word and displays all the clubs that are related
                            to the user’s interest. The user may choose to register for the interested club, contact the
                            club founder, connect with the club members, and access the mailing list directly through
                            our web application. Additionally, pre-existing and former members of the clubs have an
                            option to rate the club so that new interested users have an idea of how the club is.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa fa-arrow-right"></i>
                                What can I do from this website?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>You will be able to search for active clubs through the search bar.</li>
                                <li>You can select a preference category for clubs, for example: Sports, Dance, Arts,
                                    Outreach and Fellowship, and Others.</li>
                                <li>You will get tailored recommendations of clubs you might be interested in based on
                                    your major, preferences, and club involvement.</li>
                                <li>You can register for a club you are interested in with one click.</li>
                                <li>You will be able to see the number of people registered in a club.</li>
                                <li>You will be able to see the timings and venue of the club activities.</li>
                                <li>You will be able to communicate with the admin of the club through a single click.
                                </li>
                                <li>You will be presented with a “What’s Happening Today” and “Upcoming Events”
                                    section in the home page.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fa fa-arrow-right"></i>
                                How do I register for a club?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Easy. Just press the "Sign Up" button on the top right (in green), enter your Jacobs email
                            (...@jaocbs-university.de), enter a password, and enjoy.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="hd4">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#coll4" aria-expanded="false" aria-controls="coll4">
                                <i class="fa fa-arrow-right"></i>
                                How do I contact the club owners?
                            </button>
                        </h2>
                    </div>
                    <div id="coll4" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Search for the club that you are interested in and simply press the "Contact Owner" button.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="hd5">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#coll5" aria-expanded="false" aria-controls="coll5">
                                <i class="fa fa-arrow-right"></i>
                                How do I manage my club as a club owner?
                            </button>
                        </h2>
                    </div>
                    <div id="coll5" class="collapse" aria-labelledby="hd5" data-parent="#accordionExample">
                        <div class="card-body">
                            First, make sure that you are logged-in through your club email. Then go to "My Account".
                            There, you can create events, view your club activities, send emails, notify members, and
                            many more!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End FAQ -->