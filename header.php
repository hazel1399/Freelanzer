<body id="body">  
	 <header>
        <nav class="navbar navbar-expand-sm bg-info  navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#expand">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="expand">
                <ul class="navbar-nav">                	
                    <li class="nav-item"><a href="index.php" class="nav-link">Freelancer</a></li>
                    <?php if (isset($_SESSION['Email']) AND !isset($_SESSION['Banco'])) {?>
                    <li class="nav-item"><a href="postular.php" class="nav-link">Postularse</a></li> <?php } ?>



                    <?php if (isset($_SESSION['Email']) AND isset($_SESSION['Banco'])) {?>
                    <li class="nav-item"><a href="Ofertar.php" class="nav-link">Ofertar</a></li> 
                    <li class="nav-item"><a href="MiOfertas.php" class="nav-link">Mis ofertas</a></li> 
                <?php } ?>


                     <?php if (!isset($_SESSION['Email'])) {?>                                                                                              
                    <div class="pull-right"> 
                        <li class="nav-item"><a href="registro.php" class="nav-link"><i class="fas fa-user-plus"></i> Registrarse </a>                                            
                    </div>    
                    <div class="pull-right" id="Ingresar" >
                        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-sign-in"></i> Ingresar </a>                        
                    </div><?php } ?>  
                    <?php if (isset($_SESSION['Email'])) {?>
                    <div class="pull-right">
                        <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-in"></i> Cerrar sesion </a>                        
                    </div> <?php } ?>               
                </ul>
            </div>            
        </nav>        
    </header>