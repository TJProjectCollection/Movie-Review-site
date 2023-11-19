    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/NavbarText.css"/>
    </head>
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-toggler ">
            <div class="container-fluid">
                <a class="navbar-brand" href="Movies.php"><span class="
                <?php if ($_SESSION['pageid'] == "Movies") {echo "Currenttab";} else { echo "Othertab";}?>                                                
                fa fa-film ">Movie Reviews</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                     <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        
                    <?php if(isset($_SESSION['user_id'])){?>    
                    <li class="nav-item ">
                        <a class="nav-link" href="Review.php"><span class="
                        <?php if ($_SESSION['pageid'] == "Review") {echo "Currenttab";} else { echo "Othertab";}?>                                            
                        fa fa-pen">Review</span></a>
                    </li>
                    
                    <li class="nav-item ">
                        <a class="nav-link" href="Acc_details.php"><span class="
                        <?php if ($_SESSION['pageid'] == "Acc_details") {echo "Currenttab";} else { echo "Othertab";}?>                                                 
                        fa fa-address-card">Account Details</span></a>
                    </li>
                    
                    <?php }else{ ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="Login.php"><span class="
                        <?php if ($_SESSION['pageid'] == "Login") {echo "Currenttab";} else { echo "Othertab";}?>
                        fa fa-user">Login</span></a>
                    </li>
                    
                    <li class="nav-item ">
                        <a class="nav-link" href="Register.php"><span class="
                        <?php if ($_SESSION['pageid'] == "Register") {echo "Currenttab";} else { echo "Othertab";}?>
                        fa fa-user-plus">Register</span></a>
                    </li>
                    
                    <?php } ?>
                    
                    <li class="nav-item ">
                        <a class="nav-link" href="Contact.php"><span class="
                        <?php if ($_SESSION['pageid'] == "Contact") {echo "Currenttab";} else { echo "Othertab";}?>                                             
                        fa fa-phone">Contact Us</span></a>
                    </li>
                    
                    <?php if(isset($_SESSION['user_id'])){?> 
                    <li class="nav-item ">
                        <a class="nav-link" href="Logout.php"><span class="
                        <?php if ($_SESSION['pageid'] == "Logout") {echo "Currenttab";} else { echo "Othertab";}?>                                            
                        fa fa-user">Logout</span></a>
                    </li>
                    <?php } ?>
                   </ul>
                </div>
            </div>
           <?php if ($_SESSION['pageid'] == "Movies") {?>  
            <form method="post" action="doFilter.php" class="d-flex mt-3">
                <input class="form-control me-2" type="text" name="Title" placeholder="Search by Title">
                <input name="Rating" type="hidden" value=0>
                <input name="runTime" type="hidden" value=0>
                <input name="genrecount" type="hidden" value=0>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
           <?php } ?>
        </nav>  