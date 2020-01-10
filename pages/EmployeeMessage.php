<a href='index.php?page=logout'>Log out</a>
<a href='index.php?page2=EmployeeMainPage.php'>Main Page</a>
<a href="index.php?page2=EmployeeTickets.php">My Tickets</a>
<h1>Ticket</h1>
<?php
	$id=$_SESSION['ticket'];
	$dbName = 'helpdesk';
	$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error1');
	if(isset($_POST['delete'])){
		$query = "DELETE FROM ".$TableName." WHERE TicketID LIKE ?";
		If($stmt = mysqli_prepare($conn, $query)){
			mysqli_stmt_bind_param($stmt, 'si', $id);
			If(mysqli_stmt_execute($stmt)){
				echo 'Ticket deleted';
				die();
			} else {
				echo 'error454';
			}
		} else {
			echo 'error45444';
		}
	}
	If(isset($_POST['send'])){
		if(empty($_POST['message'])){
			echo 'Message is empty!';
		} else {
			$TableName = 'Message';
			$message = $_POST['message'];
			If($message !== $_SESSION['conn']){
				$ticketID = $_SESSION['ticket'];
				$date = date("Y-m-d");
				$sender = $_SESSION['id'].'ad';
				$query = "INSERT INTO ".$TableName." VALUES(NULL,?,?,?,?)";
				If($stmt = mysqli_prepare($conn, $query)){
					mysqli_stmt_bind_param($stmt, 'siss', $message, $ticketID, $date, $sender);
					If(mysqli_stmt_execute($stmt)){
						echo '<p>Message Sended</p>';
						$_SESSION['conn'] = $message;
					} else {
						echo '<p>Error7!</p>';
					}
				} else {
					echo '<p>Error6!</p>';
				}
			}
		}
	}
	$TableName = 'Ticket';
	$query = "SELECT TicketID, Title, Content, Status, Employee.Employee_Name, Employee.Company_Name FROM " . $TableName.
	 " JOIN Employee ON Ticket.UserID = Employee.UserID WHERE TicketID LIKE ?";
	if($stmt = mysqli_prepare($conn, $query)){
		mysqli_stmt_bind_param($stmt, 's', $id);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $id, $title, $content, $status, $name, $company);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>Empty!</p>';
			} else {
				while(mysqli_stmt_fetch($stmt)){
					echo '<p>Title: '.$title.'</p>';
					echo '<p>Name: '.$name.'</p>';
					echo '<p>Company: '.$company.'</p>';
					echo '<p>Content: '.$content.'</p>';
				}
			}
		} else {
			echo 'Error3';
		}
	} else {
		echo 'Error2';
	}
	if(isset($_POST['choose'])){
		$TableName = 'Ticket';
		$query = "UPDATE ".$TableName." SET Status=? WHERE TicketID=?";
		$status = 'In process';
		If($stmt = mysqli_prepare($conn, $query)){
			mysqli_stmt_bind_param($stmt, 'si', $status, $id);
			If(mysqli_stmt_execute($stmt)){
				
			} else {
				echo 'Error200';
			}
		} else {
			echo 'Error200';
		}
	}
	$TableName = 'Ticket';
	$query = "SELECT Status FROM " . $TableName.
	 " WHERE TicketID LIKE ?";
	if($stmt = mysqli_prepare($conn, $query)){
		mysqli_stmt_bind_param($stmt, 's', $id);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $status);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>Empty!</p>';
			} else {
				while(mysqli_stmt_fetch($stmt)){
					if($status !== 'Sent'){
?>
<h2>Messages</h2>
<?php
	$TableName = 'Message';
	$query = 'SELECT Content, Date, SenderID FROM '.$TableName;
	If($stmt = mysqli_prepare($conn, $query)){
		If(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $content2, $date2, $sender2);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>Empty!</p>';
			} else {
				while(mysqli_stmt_fetch($stmt)){
					$sender3 = $_SESSION['id'].'ad';
					if($sender2 === $sender3){
						echo ' My message: ';
						echo $content2;
					} else {
						echo 'Admin: ';
						echo $content2;
					}
				}
			}
		} else {
			echo '<p>Error9!</p>';
		}
	} else {
		echo '<p>Error8!</p>';
	}
	$TableName = 'Ticket';
	$query = "SELECT Status FROM " . $TableName.
	 " WHERE TicketID LIKE ?";
	if($stmt = mysqli_prepare($conn, $query)){
		mysqli_stmt_bind_param($stmt, 's', $id);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $status);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>Empty!</p>';
			} else {
				while(mysqli_stmt_fetch($stmt)){
					if($status !== 'Closed'){
	
?>
<h2>Message</h2>
<form method='post'>
	<textarea name="message"></textarea>
	<input type='submit' name='send' value='Send'>
</form>
<form method='post'>
	<input type='submit' name='delete' value='Delete ticket'>
</form>

<?php
								}
							}
						}
					} else {
						echo 'errorrrr';
					}
				} else {
					echo 'error445';
				}
					}
				}
			}
		}
	}
			
?>