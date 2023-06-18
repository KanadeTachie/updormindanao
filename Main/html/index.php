<?php 
    require "connect.php";
    $search ="";
    if (isset($_REQUEST['search'])) {
        $search = $_REQUEST['search'];
    }	
    $sql = "SELECT * FROM dorms";
    if ($search != "") {
        $sql = "SELECT * FROM dorms WHERE owner LIKE '%$search%' OR name LIKE '%$search%'";
    }	
    $result = $conn->query($sql);
?>


<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dormisko</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/elements.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/jquery-1.12.3.min.js"></script>
    
</head>

<body>
    <header class="header">
        <div class="left-section">
            <a href="http://localhost/Dormisko/Main/html/">
                <img class="logo" src="../images/Header/dormiskologo.png">
            </a>
        </div>
        <div class="middle-section">
            <input class="search-bar" type="input" placeholder="Search" name="search"> 
            <img class="search-icon" src="../images/Header/Search Icon White.png">
        </div>
        <div class="right-section">
        </div>
    </header>
    <nav class="navigation">
        <div class="nav-container">
            <a href=""><img src="../images/Navigation Bar/list-icon.png"></a>
            <a href="" class="nav-text">List</a>
        </div>
        <div class="nav-container">
            <a href="../html/MainLocation.html"><img src="../images/Navigation Bar/maps-icon.png"></a>
            <a href="" class="nav-text">Map</a>
        </div>
    </nav>
    <main>
        <section class="preview-grid">
            <?php while($row = $result->fetch_assoc()) { ?>
                <div class="preview-container">
                    <div class="img-container">
                        <a href="#" class="btnView" id="<?php echo $row['iddorms'] ?>"><img src=<?php echo $row['imagelink']??""; ?>></a>
                    </div>
                    <div class="summary-container">
                        <div class="first-column">
                            <a href="#" class="btnView" id="<?php echo $row['iddorms'] ?>"><?php echo $row['name']??""; ?></a>
                            <p>Bed space: <?php echo $row['roomcapacity']??""; ?></p>
                            <p>Water: <?php echo $row['water']??""; ?></p>
                            <p>Electricity: <?php echo $row['electricity']??""; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </section>
    </main>

    <script>
		$(document).ready(function() {
			$('.btnView').click(function(){	
				var recid = $(this).attr('id');
				
                var url = "http://localhost/Dormisko/Dorms/html/detail.php?id=" + recid;
                window.open(url);
			});
		});
	</script>
</body>