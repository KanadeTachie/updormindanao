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
<?php while($row = $dorm->fetch_assoc()) { ?>
    <title><?php echo $row['name']??""; ?></title>
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
            <a href="http://localhost/Dormisko/Main/html/#">
                <img class="logo" src="../images/Header/dormiskologo.png">
            </a>
        </div>
        <div class="middle-section">
        </div>
        <div class="right-section">
        </div>
    </header>
 
    <main>
    
        <section class="title-container">
            <div>
                <p class="title"><?php echo $row['name']??""; ?></p>
            </div>
            <div class="address-owner-container">
                <p><img src="../images/Dorms/Icons/address-icon.png"><?php echo $row['address']??""; ?></p>
                <p><img src="../images/Dorms/Icons/owner-icon.png">Owner: <?php echo $row['owner']??""; ?></p>
                <p>Email: <?php echo $row['email']??""; ?></p>
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

    <section class="left-right-info-container">
        <section class="building-info-container"> <!-- left section -->
        <?php while($row = $bfp->fetch_assoc()) { ?>
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
                                <?php if ($row['doublelockinside'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Window Covering that provides privacy and can be<br>
                                <!-- &nbsp; -->&ensp;&ensp;opened and closed by the room residents</li>
                                <?php if ($row['curtain'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Privacy Latch that can be securely latched from the<br>
                                <!-- &nbsp; -->&ensp;&ensp;inside without a key in a shared bathroom or toilet</li>
                                <?php if ($row['privacylatch'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Stay-in owner/landlord/landlady</li>
                                <?php if ($row['ownerstayin'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
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
                                <?php if ($row['electricalchecked'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>All Electrical circuits are connected to appropriate circuit<br>
                                &ensp;&ensp;breakers</li>
                                <?php if ($row['circuitbreaker'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div><!-- &nbsp; -->
                                <li>All gas installations and fittings are checked by a<br>
                                &ensp;&ensp;licensed gas fitter once at least every two years</li>
                                <?php if ($row['gaschecked'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>All rooms, bathrooms, shower rooms, toilets, and laundry<br>
                                &ensp;&ensp;areas are provided with ventilation </li>
                                <?php if ($row['lights'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
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
                                <?php if ($row['guard'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>CCTV</li>
                                <?php if ($row['cctv'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Perimeter Fence</li>
                                <?php if ($row['fence'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Main Gate Entrance Lock</li>
                                <?php if ($row['maingate'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Perimeter Lights</li>
                                <?php if ($row['perimeterlight'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Window Grilles</li>
                                <?php if ($row['windowgrill'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Record/Logbook (to record in and out of the Residents'<br>
                                &ensp;&ensp;visitor</li>
                                <?php if ($row['logbook'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Curfew</li>
                                <?php if ($row['curfew'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Properly lighted hallways and corridors</li>
                                <?php if ($row['hallwaylight'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Street lights </li>
                                <?php if ($row['streetlight'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
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
                                <?php if ($row['clothdrying'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Wash through or basin plumbed to a continuous and<br>
                                &ensp;&ensp;adequate supply of water</li>
                                <?php if ($row['lavatory'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Well ventilated kitchen area</li>
                                <?php if ($row['ventilatedkitchen'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Dining Area </li>
                                <?php if ($row['diningarea'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Provision for conducive study area</li>
                                <?php if ($row['studyarea'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                            <div>
                                <li>Common Area/Reception for Visitors</li>
                                <?php if ($row['receptionarea'] == "YES") { ?>
                                    <img class="check-icon" src="../images/Dorms/Icons/CheckIcon.png">
                                <?php } else { ?>
                                    <img class="x-icon" src="../images/Dorms/Icons/x-icon.png">
                                <?php } ?>
                            </div>
                    </div><!--  end of detail container -->
                </section>
            <?php } ?>
   
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