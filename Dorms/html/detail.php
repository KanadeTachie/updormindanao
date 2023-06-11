<?php 
    require "connect.php";
    $id ="0";
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
    }	
    $sql = "SELECT * FROM dorms WHERE iddorms = $id";
    $dorm = $conn->query($sql);

    $sql = "SELECT * FROM bfp WHERE iddorms = $id";
    $bfp = $conn->query($sql);

    $sql = "SELECT * FROM security WHERE iddorm = $id";
    $security = $conn->query($sql);

    $sql = "SELECT * FROM privacy WHERE iddorm = $id";
    $privacy = $conn->query($sql);

    $sql = "SELECT * FROM amenity WHERE iddorm = $id";
    $amenity = $conn->query($sql);

    $sql = "SELECT * FROM safety WHERE iddorm = $id";
    $safety = $conn->query($sql);
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
        </div>
        <div class="right-section">
        </div>
    </header>
 
    <main>
    <?php while($row = $dorm->fetch_assoc()) { ?>
        <section class="title-container">
            <div>
                <p class="title"><?php echo $row['name']??""; ?></p>
            </div>
            <div class="address-owner-container">
                <p><img src="../images/Dorms/Icons/address-icon.png"><?php echo $row['address']??""; ?></p>
                <p><img src="../images/Dorms/Icons/owner-icon.png">Owner: <?php echo $row['owner']??""; ?></p>
            </div>
        </section>
        <section class="image-fees-container">
            <div class="image-container">
                <div class="main-image-container">
                    <img src="<?php echo $row['imagelink']??""; ?>">
                </div>
                <div class="other-image-container">
                    <img class="other-image-1" src="<?php echo $row['imagelink2']??""; ?>">
                    <img class="other-image-2" src="<?php echo $row['imagelink3']??""; ?>">
                </div>
            </div>
            <div class="fees-buttons-container">
                <div class="fee-container">
                    <div>
                        <p>Total number of Rooms for Occupancy:  </p>
                        <p><?php echo $row['rooms']??""; ?></p>
                    </div>
                    <div>
                        <p>Maximum Number of Occupants: </p>
                        <p></p>
                    </div>
                    <div>
                        <p>Maximum Number of Occupants per Room: </p>
                        <p><?php echo $row['roomcapacity']??""; ?></p>
                    </div>
                    <div>
                        <p>Rental Fee per Head: </p>
                        <p><?php echo $row['rentperhead']??""; ?></p>
                    </div>
                    <div>
                        <p>Rental Fee per Room: </p>
                        <p><?php echo $row['rentperroom']??""; ?></p>
                    </div>
                    <div>
                        <p>Required Amount for Deposit: </p>
                        <p><?php echo $row['deposit']??""; ?></p>
                    </div>
                    <div>
                        <p>Required Amount for Advance Payments: </p>
                        <p><?php echo $row['advance']??""; ?></p>
                    </div>
                    <div>
                        <p>Transient Fees: </p>
                        <p><?php echo $row['transient']??""; ?></p>
                    </div>
                    <div>
                        <p>Electricity Rates: </p>
                        <p><?php echo $row['electricity']??""; ?></p>
                    </div>
                    <div>
                        <p>Water Use/Fees: </p>
                        <p><?php echo $row['water']??""; ?></p>
                    </div>
                    <div>
                        <p>Internet Use/Fees on WiFi Connection: </p>
                        <p><?php echo $row['internet']??""; ?></p>
                    </div>
                    <div>
                        <p>Other Charges: </p>
                        <p><?php echo $row['othercharge']??""; ?></p>
                    </div>
                </div>
                <div class="button-container">
                    <div class="contact-container">
                        <p><img src="../images/Dorms/Icons/contact-icon.png"><?php echo $row['contact']??""; ?></p>
                    </div>
                    <div class="map-button-container">
                        <a href="https://www.google.com/maps/d/u/0/embed?mid=<?php echo $row['maplocation']??""; ?>" ><img src="../images/Dorms/Icons/map-icon.png"></a>
                        <a href="https://www.google.com/maps/d/u/0/embed?mid=<?php echo $row['maplocation']??""; ?>" >Go to Maps</a>
                    </div>
                </div>
            </div> <!-- End of fees button container -->
        </section>
        <section class="popup-image-section">
            <span>&times;</span>
            <img src="<?php echo $row['imagelink']??""; ?>">
        </section>
        <section class="popup-image-section2">
            <span>&times;</span>
            <img src="<?php echo $row['imagelink']??""; ?>">
        </section>
    <?php } ?>

    <?php while($row = $bfp->fetch_assoc()) { ?>
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
                                <?php if ($row['extinguisher'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Fire Exit</li>
                                <?php if ($row['fireexit'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Fire Alarm</li>
                                <?php if ($row['firealarm'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Smoke Detector</li>
                                <?php if ($row['smokedetector'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Firehose Cabinet</li>
                                <?php if ($row['firehose'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Evacuation Route Plan</li>
                                <?php if ($row['evacroute'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                        </div>
                    </div><!--  end of detail container -->
                </section>
            <?php } ?>

            <?php while($row = $privacy->fetch_assoc()) { ?>
                <section class="bfp-container">
                    <div class="title-container">
                        <p>Privacy</p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-title">
                            <div>
                                <li>Lock (outside the Room) </li>
                                <?php if ($row['lockoutside'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
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
            <?php } ?>

            <?php while($row = $safety->fetch_assoc()) { ?>
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
            <?php } ?>

            <?php while($row = $security->fetch_assoc()) { ?>
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
            <?php } ?>

            <?php while($row = $amenity->fetch_assoc()) { ?>
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
            <?php } ?>
   
            </section>
            <section class="building-info-right-section">
                
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