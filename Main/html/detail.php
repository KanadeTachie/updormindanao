<?php 
    require "connect.php";
    $id ="0";
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
    }	
    $sql = "SELECT * FROM dorms WHERE iddorms = $id";
    $result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- #7b1113; maroon color UP -->
    <title>Silva Dormitory</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/elements.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    
</head>
<body>
    <header class="header">
        <div class="left-section">
            <a href="../Main/html/Happy Progress Day.html">
                <img class="logo" src="../images/Header/dormiskologo.png">
            </a>
        </div>
        <div class="middle-section">
            <input class="search-bar" type="input" placeholder="Search"> 
            <img class="search-icon" src="../images/Header/Search Icon White.png">
        </div>
        <div class="right-section">
            <a href="./Login.html" class="sign-up">Sign Up</a>
            <a href="./Login.html" class="login">Log In</a>
            <img class="profile-pic" src="../images/Header/Blank Profile Pic.jpg">
        </div>
    </header>
    <main>
        <section class="title-container">
            <div>
                <p class="title">Silva Dormitory</p>
            </div>
            <div class="address-owner-container">
                <p><img src="../images/Dorms/Icons/address-icon.png">Address: P-4 Sitio Basak Mintal Davao City</p>
                <p><img src="../images/Dorms/Icons/owner-icon.png">Owner: Pia Silva</p>
            </div>
        </section>
        <section class="image-fees-container">
            <div class="image-container">
                <div class="main-image-container">
                    <img src="../images/Dorms/SILVA-DORMITORY/SILVA-DORMITORY(1).png">
                </div>
                <div class="other-image-container">
                    <img class="other-image-1" src="../images/Dorms/SILVA-DORMITORY/SILVA-DORMITORY(2).png">
                    <img class="other-image-2" src="../images/Dorms/SILVA-DORMITORY/SILVA-DORMITORY(3).png">
                </div>
            </div>
            <div class="fees-buttons-container">
                <div class="fee-container">
                    <div>
                        <p>Total number of Rooms for Occupancy:  </p>
                        <p>33</p>
                    </div>
                    <div>
                        <p>Maximum Number of Occupants: </p>
                        <p>132</p>
                    </div>
                    <div>
                        <p>Maximum Number of Occupants per Room: </p>
                        <p>4</p>
                    </div>
                    <div>
                        <p>Rental Fee per Head: </p>
                        <p>N/A</p>
                    </div>
                    <div>
                        <p>Rental Fee per Room: </p>
                        <p>₱3900 - ₱4700</p>
                    </div>
                    <div>
                        <p>Required Amount for Deposit: </p>
                        <p>1 month</p>
                    </div>
                    <div>
                        <p>Required Amount for Advance Payments: </p>
                        <p>1 month</p>
                    </div>
                    <div>
                        <p>Transient Fees: </p>
                        <p>NONE</p>
                    </div>
                    <div>
                        <p>Electricity Rates: </p>
                        <p>with meter</p>
                    </div>
                    <div>
                        <p>Water Use/Fees: </p>
                        <p>with meter</p>
                    </div>
                    <div>
                        <p>Internet Use/Fees on WiFi Connection: </p>
                        <p>NONE</p>
                    </div>
                    <div>
                        <p>Other Charges: </p>
                        <p>NONE</p>
                    </div>
                </div>
                <div class="button-container">
                    <div class="contact-container">
                        <p><img src="../images/Dorms/Icons/contact-icon.png">09224580688</p>
                    </div>
                    <div class="map-button-container">
                        <a href="./SilvaDormitorygmap.html"><img src="../images/Dorms/Icons/map-icon.png"></a>
                        <a href="./SilvaDormitorygmap.html">Go to Maps</a>
                    </div>
                </div>
            </div> <!-- End of fees button container -->
        </section>
        <section class="popup-image-section">
            <span>&times;</span>
            <img src="../images/Dorms/AbergasBoardingHouse/AbergasBoardingHouse.png">
        </section>
        <section class="popup-image-section2">
            <span>&times;</span>
            <img src="../images/Dorms/AbergasBoardingHouse/AbergasBoardingHouse(2).png">
        </section>

        <script src="../js/clickableimage.js"></script>

        <section class="left-right-info-container">
            <section class="building-info-container"> <!-- left section -->
                <section class="bfp-container">
                    <div class="title-container">
                        <p>Bureau of Fire Protection (BFP) Compliance</p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-title">
                            <div>
                                <li>Fire Extinguisher</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Fire Exit</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Fire Alarm</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Smoke Detector</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Firehose Cabinet</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Evacuation Route Plan</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                        </div>
                    </div><!--  end of detail container -->
                </section>
                <section class="bfp-container">
                    <div class="title-container">
                        <p>Privacy</p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-title">
                            <div>
                                <li>Lock (outside the Room) </li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Double Lock (Inside the Room) </li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Window Covering that provides privacy and can be<br>
                                <!-- &nbsp; -->&ensp;&ensp;opened and closed by the room residents</li>
                                <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Privacy Latch that can be securely latched from the<br>
                                <!-- &nbsp; -->&ensp;&ensp;inside without a key in a shared bathroom or toilet</li>
                                <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Stay-in owner/landlord/landlady</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                        </div>
                    </div><!--  end of detail container -->
                </section>
                <section class="bfp-container">
                    <div class="title-container">
                        <p>Safety</p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-title">
                            <div>
                                <li>All Electrical installation and fixtures are checked by a<br>
                                &ensp;&ensp;licensed electrician at least once in every three years
                                     </li>
                                     <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>All Electrical circuits are connected to appropriate circuit<br>
                                &ensp;&ensp;breakers</li>
                                <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div><!-- &nbsp; -->
                                <li>All gas installations and fittings are checked by a<br>
                                &ensp;&ensp;licensed gas fitter once at least every two years</li>
                                <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>All rooms, bathrooms, shower rooms, toilets, and laundry<br>
                                &ensp;&ensp;areas are provided with ventilation </li>
                                <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                        </div>
                    </div><!--  end of detail container -->
                </section>
                <section class="bfp-container">
                    <div class="title-container">
                        <p>Security</p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-title">
                            <div>
                                <li>Security guard especially at night time</li>
                                <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                            </div>
                            <div>
                                <li>CCTV</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Perimeter Fence</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Main Gate Entrance Lock</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Perimeter Lights</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Window Grilles</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Record/Logbook (to record in and out of the Residents'<br>
                                &ensp;&ensp;visitor</li>
                                <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                            </div>
                            <div>
                                <li>Curfew</li>
                                <p>12:00AM</p>
                            </div>
                            <div>
                                <li>Properly lighted hallways and corridors</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Street lights </li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                        </div>
                    </div><!--  end of detail container -->
                </section>
                <section class="bfp-container">
                    <div class="title-container">
                        <p>Amenity</p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-title">
                            <div>
                                <li>Clothes line or other clothes drying facility</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Wash through or basin plumbed to a continuous and<br>
                                &ensp;&ensp;adequate supply of water</li>
                                <img class="check-icon-long" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Well ventilated kitchen area</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Dining Area </li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Provision for conducive study area</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                            <div>
                                <li>Common Area/Reception for Visitors</li>
                                <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                            </div>
                    </div><!--  end of detail container -->
                </section>
            </section>
            <section class="building-info-right-section">
                <div class="facilities-safety-container">
                    <div class="title">
                        <p>Facilities/Safety</p>
                    </div>
                    <div class="facilities-safety">
                        <div>
                            <p>BFP COMPLIANCE</p>
                            <p>Yes</p>
                        </div>
                        <div>
                            <p>PRIVACY</p>
                            <p>Yes</p>
                        </div>
                        <div>
                            <p>SAFETY</p>
                            <p>Yes</p>
                        </div>
                        <div>
                            <p>SECURITY</p>
                            <p>No</p>
                        </div>
                        <div>
                            <p>AMENITIES</p>
                            <p>Yes</p>
                        </div>
                        <div>
                            <p>INTERNET</p>
                            <p>No</p>
                        </div>
                    </div>
                </div> <!-- end of facilities safety container -->
                <form class="reserve-now-container" action="/action_page.php">
                    <div class="title-container">
                        <p>RESERVE NOW!</p>
                    </div>
                    <div class="subtitle-container">
                        <p>Set appointment</p>
                    </div>
                    <div class="user-info-container">
                        <div class="email-container">
                            <p>Email:</p>
                            <input type="email" placeholder="Enter your email">
                        </div>
                        <div class="fullname-container">
                            <p>Name:</p>
                            <input type="text" placeholder="Enter your ful name" required>
                        </div>
                        <div class="contact-number-container">
                            <p>Contact No.:</p>
                            <div>
                                <input id="readonly-number" type="tel" value="+63 " readonly>
                                <input type="tel" placeholder="Enter your contact number" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="submit-container">
                        <input type="submit" value="Send!">
                    </div>
                </form>
            </section>
        </section>  <!-- end of the whole building info container -->
    </main>
    <footer>
        <div>
            <p>CMSC 3 2022 Project</p>
            <p>King Behimino</p>
            <p>Owen Cariño</p>
            <p>©COPYRIGHT 2022</p>
        </div>
    </footer>
</body>