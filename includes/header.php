<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a id="siteLogo" class="navbar-brand" href="index.php">
            <span>
                <img id="logo" src="./img/logo.png" alt="logo">
            </span>
            <span class="h1 px-0 py-auto">KinoWatch</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Genres
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            $sql = "SELECT genre FROM genres";
                            $res = $link->query($sql)->fetch_all(MYSQLI_ASSOC);
                            foreach ($res as $k=>$v):
                            ?>
                                <a class="dropdown-item" href="./genre.php?genre=<?=$v['genre']?>"><?=$v['genre']?></a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </li>
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']['username']=='admin'):
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
                <?php endif ?>
            </ul>

            <?php
            if (isset($_SESSION['user'])) {
                echo'
                <div id="signedUser" class="mt-2 mt-md-0 col-12 col-md-5 col-xl-3 m-0 p-0">
                        <div class="btn-group container-fluid m-0 p-0">
                            <a href="userProfile.php" class="btn btn-light col-9">
                                <span id="userProfileBtn" class="row m-0 p-0">'.$_SESSION["user"]["username"].'</span>
                            </a>
                            <a href="scripts/logout.php" class="btn btn-success text-white col-3">LogOut</a>
                        </div >
                </div>';
            } else {
                echo<<<buttons
                <div id="authButtons" class="mt-2 mt-md-0 col-12 col-md-5 col-xl-3 m-0 p-0">  
                    <div class="btn-group container-fluid m-0 p-0" role="group" aria-label="authButtons">
                        <button class="btn btn-light" data-toggle="collapse" data-target="#signInForm"
                                aria-expanded="false" aria-controls="collapseExample">
                            Sign in
                        </button >
                        <a href="registration.php" class="btn btn-success text-white">Register</a>
                    </div >
                    
                    <div id="signInForm" class="collapse">
                        <form class="card card-body">
                            <p id="error" class="bg-warning text-center text-danger"></p>
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="email" aria-describedby="email">Email</label>
                                </div>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                       required>
                            </div>
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="password"
                                           aria-describedby="password">Password</label>
                                </div>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                                       aria-label="Password" required>
                            </div>
                            <button id="signInBtn" class="btn btn-primary btn-sm">Sign in</button>
                        </form>
                    </div>
                </div>
                buttons;
            } ?>
        </div>
    </nav>

    <form class="container-fluid input-group input-group-lg px-0" method="GET" action="./search.php">
        <input class="form-control rounded-0" type="text" required name="search"
               placeholder="Search..." autocomplete="off">
        <div class="input-group-append">
            <input class="btn btn-primary rounded-0" type="submit" value="Search">
        </div>
    </form>

</header>