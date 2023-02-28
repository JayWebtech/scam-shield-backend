<?php
session_start();
include "../../include/db_connection.php";

$huname = $_SESSION['huname'];

if (empty($huname)) {
	header("Location: ../index?msg=expired");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - usemyplugg</title>
    <link rel="icon" type="icon" href="../../img/favicon.ico">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../dist/css/iziToast.min.css">
     <script src="../../dist/js/iziToast.min.js" type="text/javascript"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="" class="brand-logo">
                <center><img src="../../img/favicon.ico"></center>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                           
                        </div>

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link dz-fullscreen primary" href="#">
									<svg id="Capa_1" enable-background="new 0 0 482.239 482.239" height="22" viewBox="0 0 482.239 482.239" width="22" xmlns="http://www.w3.org/2000/svg"><path d="m0 17.223v120.56h34.446v-103.337h103.337v-34.446h-120.56c-9.52 0-17.223 7.703-17.223 17.223z" fill=""/><path d="m465.016 0h-120.56v34.446h103.337v103.337h34.446v-120.56c0-9.52-7.703-17.223-17.223-17.223z" fill=""/><path d="m447.793 447.793h-103.337v34.446h120.56c9.52 0 17.223-7.703 17.223-17.223v-120.56h-34.446z" fill="" /><path d="m34.446 344.456h-34.446v120.56c0 9.52 7.703 17.223 17.223 17.223h120.56v-34.446h-103.337z" fill=""/></svg>
                                </a>
							</li>
                            
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>Welcome, <strong>Admin</strong></span>
									</div>
                                    <img src="img/user.svg">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="settings" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Settings </span>
                                    </a>
                                    
                                    <a href="logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="ai-icon" href="index"  aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>


                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Category</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="new-category">New Category</a></li>
                            <li><a href="view-category">View Category</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon active" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Artisans</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="new-artisan">New Artisans</a></li>
                            <li><a href="view-artisan">View Artisans</a></li>
                        </ul>
                    </li>

					 <li><a href="report" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Search Reports</span>
						</a>
					</li>

					<li><a href="logout" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Logout</span>
						</a>
					</li>
                </ul>
            
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				
                <div class="row">

                		<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                               <h3 class="text-black font-w600 mb-0">Add New Artisan</h3>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                	
                                   <form id="formadd" name="form1" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Full Name</label>
                                                
                                                <input type="text" id="name" name="name" class="form-control"  placeholder="Artisan Fullname">
                                            </div>
                                           
                                            <div class="form-group col-md-12">
                                                <label>Phone Number</label>
                                                <input type="text" id="gsm" class="form-control" name="gsm" placeholder="Artisan Phone Number">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Address</label>
                                                <input type="text" id="address" class="form-control" name="address" placeholder="Artisan Address">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Artisan Category</label>
                                                <select name="ctg" id="ctg" class="form-control">
                                                    <?php
                                                        $sqlc = "SELECT * FROM category ORDER BY id DESC";
                                                        $runc = mysqli_query($dbcon,$sqlc);
                                                        while ($rowc=mysqli_fetch_assoc($runc)) {
                                                            ?>
                                                                <option value="<?php echo $rowc['ctg']; ?>"><?php echo $rowc['ctg']; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                             	  <label>State</label>
                                                  <select onchange="toggleLGA(this);" name="state" id="state" class="form-control">
                                                    <option value="" selected="selected">- Select -</option>
                                                    <option value="Abia">Abia</option>
                                                    <option value="Adamawa">Adamawa</option>
                                                    <option value="AkwaIbom">AkwaIbom</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Ebonyi">Ebonyi</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="FCT">FCT</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">Kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamafara</option>
                                                </select>
                                            </div>

                                             <div class="form-group col-md-6">
                                             	  <label>Local Government</label>
                                                  <select name="lga" id="lga" class="form-control select-lga" required>
                                                 </select>                                            
                                             </div>

                                            

                                          
                                              <div class="form-group col-md-12">
                                             	  <label>Email</label>
                                                 <input type="text" class="form-control" id="email" name="email" placeholder="Artisan Email">
                                            </div>

                                         <br>

                                             <button class="btn btn-secondary btn-block btn-lg" style="background-color: #F46B30;box-shadow: none;border: none;" id="save"><span class="bi bi-lock" id="lock"></span> <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 20px; height: 20px;display: none;"></span> Proceed</button>




                                           </form>
                                       </div>

                                </div>
                            </div>
                        </div>
					
					</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<script type="text/javascript">
    $(document).ready(function(){

//SIGN UP

 $(document).on('submit','#formadd', function(e){
                e.preventDefault();
                $("#save").attr("disabled", "disabled");
                $("#spinner").show();
                $("#lock").hide();

                var ctg = $("#ctg").val();
                var name = $("#name").val();
                var gsm = $("#gsm").val();
                var address = $("#address").val();
                var state = $("#state").val();
                var lga = $("#lga").val();
                var email = $("#email").val();
                if (ctg !="" && name !="" && gsm !="" && address !="" && state !="" && lga !="" && email !="") {
                    $.ajax({
                        method: "POST",
                        url: "art-script.php",
                        data: $(this).serialize(),
                        success: function(data){
                          
                            if (data=="success") {
                                $("#save").removeAttr("disabled");
                                $("#success").show();
                                $("#spinner").hide();
                                $("#name").val("");
                                $("#gsm").val("");
                                $("#address").val("");
                                $("#email").val("");
                                    iziToast.success({
                                    title: 'Success',
                                    message: "Artisan added successfully",
                                    position: 'topCenter',
                                    animateInside: true,
                                });
                              }else{
                                $("#save").removeAttr("disabled");
                                $("#success").show();
                                $("#spinner").hide();
                                $("#name").val("");
                                $("#gsm").val("");
                                $("#address").val("");
                                $("#email").val("");
                                    iziToast.error({
                                    title: 'Error',
                                    message: data,
                                    position: 'topCenter',
                                    animateInside: true,
                                });
                              }
                            }
                        });
                }else{

                    iziToast.error({
                        title: 'Error',
                        message: 'All fields are required!',
                        position: 'topCenter',
                        animateInside: true,
                    });
                     $("#lock").show();
                    $("#save").removeAttr("disabled");
                    $("#spinner").hide();

                }
            });


});
</script> 
    <script src="js/lga.min.js"></script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	
	<!-- Counter Up -->
    <script src="./vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>	
		
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	
	
</body>
</html>