<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stenden HelpDesk</title>
    <link rel="stylesheet" type="text/css" href="../CSS/mainmenu.css">
</head>

<body>
    <div id="fullPage">
      <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="user">
    			<div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
    	    <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
      </div>

        <div id="main">

            <div id="spacer-top"></div>

            <div id="maincontent">

                <div id="left-complex">
                    <div id="top-left-complex">
                        <div id="rectangle-div">
                            <a href="#">
                                <div class="effect" id="effectblue">
                                    <img class="resize-image" src="../img/ticket.png">
                                </div>
                            </a>
                        </div>

                        <div id="square-div">

                            <a href="#">
                                <div class="effect" id="effectlblue">
                                    <img class="resize-image" src="../img/mail.png">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div id="bottom-left-complex">
                        <div id="square-bottom-div">

                            <a href="#">
                                <div class="effect" id="effectlblue">
                                    <img class="resize-image" src="../img/information.png">
                                </div>
                            </a>
                        </div>

                        <div id="rectangle-bottom-div">

                            <a href="#">
                                <div class="effect" id="effectblue">
                                    <img class="resize-image" src="../img/forgotpassword.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="right-complex">
                    <div class="bigBox">

                        <a href="#">
                          <div class="effect FAQ" id="effectblue">
                            <div class="textDiv">
                              <h1 class="boxText">FAQ</h1>
                            </div>
                          </div>
                        </a>
                    </div>

                </div>

                <div id="spacer-bottom"></div>

            </div>

        </div>
</body>

</html>