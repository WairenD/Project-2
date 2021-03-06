<style media="screen">
body{
  background-image: none;
  background-color: rgb(0,100,100);
}
</style>
<div id="fullPage">
  <div id="header">
      <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
      <div id="admin">
          <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
          <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
          <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
      </div>
  </div>
    <?php
    $TableName = 'ticket';
    include 'connect.php';
    $query = "SELECT COUNT(*) FROM " . $TableName . " WHERE Status = 'Closed'";
    if ($stmt = mysqli_prepare($conn, $query)) {
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $summary);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 0) {
                echo '<div id="solved">Summary solved tickets: 0</div>';
            } else {
                while (mysqli_stmt_fetch($stmt)) {
                    ?>
                    <div class="BgTickets" id="effectblue">
                        <div class="adminSummary" id="effectteal">
                            <h3 id="h3summ">Open Tickets</h3>
                            <div id="solved"><h3>Summary solved tickets: <?php echo $summary; ?></h3></div>
                        </div>
                        <div class="TicketsBody">
                        <?php
                    }
                }
            } else {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }
        mysqli_stmt_close($stmt);
        $query = "SELECT TicketID, Title, Opening_Date, Status, admin.Admin_Name, admin.ImagePath FROM " . $TableName . "
							 JOIN admin ON ticket.AdminID = admin.AdminID";
        if ($stmt = mysqli_prepare($conn, $query)) {
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $id, $title, $date, $status, $name, $path);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 0) {
                    echo '<p>There is no data!</p>';
                } else {
                    while (mysqli_stmt_fetch($stmt)) {
                        ?>
                        <div class="Ticket" id="effectlblue">
                          <div class="TName"><?php echo $title."</div>";?>
                          <div class="TDate"><?php echo $date."</div>";
                          if ($status == 'Sent') { ?>
                              <div class="Status1"></div>
                          <?php } elseif ($status == 'In process') { ?>
                              <div class="Status2"></div>
                          <?php } else { ?>
                              <div class="Status3"></div>
                          <?php }?>
                          <div class='Prof'>
                              <img class="HelperPic" src=<?php
                              if ($path == NULL) {
                                  echo '../img/defuserpic.png';
                              } else {
                                  echo $path;
                              }?> alt="userPic">
                          </div>
                            <?php echo "<div class='HName'><h2>".$name."</h2></div>"; ?>
                        </div>
                        <?php
                    }
                }
            } else {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
      </div>
    </div>
</div>
