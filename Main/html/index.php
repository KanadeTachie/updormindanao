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

    <title>UPDormindanao</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <script src="../js/jquery-1.12.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="scard.css">

    <style>
        nav {
            background-image: url("UPMin_EBL.jpg");
            background-size: cover;
            background-attachment: fixed;
            background-position-y: -650px;
            background-repeat: no-repeat;
        }

        @media (max-width: 738px){
            nav {
                background-size: auto;
                background-position-y: -1200px;
            }
        }
    </style>
    
</head>

<body>
    <nav class="navbar bg-body-tertiary py-5">
        <div class="container-fluid">
            <div class="text-center w-100 py-2 text-white">
                <div class="display-5 fw-semibold d-none d-sm-block">UPDORMINDANAO</div>
                <div class="display-6 d-none d-md-block">Find Dorms/Boarding House/ Apartment near Mintal</div>
            </div>
            <div class="w-100 py-5">
                <form class="d-flex justify-content-center" role="search">
                    <input class="form-control me-2 w-50" id="search" name="search" type="search" placeholder="Search" aria-label="Search">
                    <input type="hidden" name="trans" value = "SEARCH">
                    <button class="btn btn-danger" type="submit">Search</button>
                </form>
            </div>
            </div>
        </div>
    </nav>
    <section class="bg-tertiary py-5">
        <div class="container py-3"> 
            <div class="row g-5">
                <?php while($row = $result->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-4"> 
                    <div class="card-custom rounded"> 
                        <div class="backgroundEffect"></div> 
                        <div class="pic"> 
                            <img src=<?php echo $row['imagelink']??""; ?>>
                        </div> 
                        <div class="content text-start"> 
                            <p class="lead mt-4 fw-semibold"><?php echo $row['name']??""; ?></p> 
                            <p class="text-muted"><div class="h-1">Water: <?php echo $row['water']??""; ?><br>Electricity: <?php echo $row['electricity']??""; ?></div></p> 
                            <div class="d-inline">
                            <a href="#" class="btn btn_view" id="<?php echo $row['iddorms'] ?>">View Deal</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			$('.btn_view').click(function(){	
				var recid = $(this).attr('id');
				
                var url = "http://localhost/Dormisko/Dorms/html/detail.php?id=" + recid;
                window.location.href = url;
			});
		});
	</script>
</body>