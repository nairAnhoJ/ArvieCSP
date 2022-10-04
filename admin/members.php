<?php
session_start();
include_once ("../includes/config/conn.php");
$db= $conn;

// code for getting the accounts//
$tableNameAccount="accounts";
$columnsAccounts= ['id', 'first_name','last_name','email_address','access'];
$fetchDataAccounts= fetch_data_Account($db, $tableNameAccount, $columnsAccounts);


function fetch_data_Account($db, $tableNameAccount, $columnsAccounts){


 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columnsAccounts) || !is_array($columnsAccounts)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableNameAccount)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columnsAccounts);
$query = "SELECT * FROM `accounts` WHERE `access` = False";

//  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
// end of code for getting the accounts//


if(isset($_GET['Approve'])){

    $accountId = $_GET['Approve'];

    $invitee="James Orozo";
    $inviteeId="13";
    $username="cedrickjames.orozo@cvsu.edu.ph";

    $sqlSelectAccount ="SELECT * FROM `accounts` WHERE `id` = '$accountId';";
    $resultAccount = mysqli_query($conn, $sqlSelectAccount);

    while($userRow = mysqli_fetch_assoc($resultAccount)){
        $fname = $userRow['first_name'];
        $lname = $userRow['last_name'];
        $inviteName = $fname." ".$lname;
        $email = $userRow['email_address'];
    }
    $sqlinsertInvite = "INSERT INTO `invites`(`name`, `idOfInvite` ,`invitee`,`inviteeID`) VALUES ('$inviteName','$accountId','$invitee','$inviteeId')";
    mysqli_query($conn, $sqlinsertInvite);
    
    $sqlGetTotalBalance= "SELECT * FROM `totalbalance` WHERE `userID` = '$inviteeId'";
    $resultTotalBalance = mysqli_query($conn, $sqlGetTotalBalance);
    
    $totalBalance = 0;
    while($userRow = mysqli_fetch_assoc($resultTotalBalance)){
        $totalBalance = $userRow['totalBalance'];
    }
    $updatedBalance = $totalBalance + 500;
    $sqlAddBalance= "UPDATE `totalbalance` SET `totalBalance`='$updatedBalance' WHERE `userID` = '$inviteeId'";
    mysqli_query($conn, $sqlAddBalance);

    $sqlinsertTransact= "INSERT INTO `transaction`(`type`,`userName`,`userId`, `inviteName`,`inviteeName`, `addedAmount`, `TotalBalance`) VALUES ('Direct Referral','$username','$inviteeId','$inviteName','$invitee','500','$updatedBalance')";
    mysqli_query($conn, $sqlinsertTransact);

    $sqlInsertUserInitialBalance= "INSERT INTO `totalbalance`(`userID`, `userName`, `totalBalance`) VALUES ('$accountId','$email','0');";
    mysqli_query($conn, $sqlInsertUserInitialBalance);

    $sqlUpdateAccess= "UPDATE `accounts` SET `access`= TRUE WHERE `id` = '$accountId'";
    mysqli_query($conn, $sqlUpdateAccess);

    
    $_SESSION['updatedBalance'] = $updatedBalance;

    $upline=$username;
    $uplineId=$inviteeId;

    for ($i = 1; $i<=10; $i++){

        $sqlGetInvitee= "SELECT * FROM `invites` WHERE `idOfInvite` = '$uplineId'";
        $resultInvitee = mysqli_query($conn, $sqlGetInvitee);
        
        $inviteeUpline = '';
        $inviteeID = '';

        while($userRow = mysqli_fetch_assoc($resultInvitee)){
            $inviteeUpline = $userRow['invitee'];
            $inviteeID = $userRow['inviteeID'];

        }
        $resultInviteeCount = mysqli_num_rows($resultInvitee);
    if($resultInviteeCount>=1){
      $sqlGetTotalBalance= "SELECT * FROM `totalbalance` WHERE `userID` = '$inviteeID'";
      $resultTotalBalance = mysqli_query($conn, $sqlGetTotalBalance);
      $totalBalance = 0;
  
      while($userRow = mysqli_fetch_assoc($resultTotalBalance)){
      $totalBalance = $userRow['totalBalance'];
      }
      $updatedBalance = $totalBalance + 10;
  
      $sqlAddBalance= "UPDATE `totalbalance` SET `totalBalance`='$updatedBalance' WHERE `userID` = '$inviteeID'";
      mysqli_query($conn, $sqlAddBalance);

      $sqlinsertTransact2= "INSERT INTO `transaction`(`type`,`userName`,`userId`, `inviteName`,`inviteeName`, `addedAmount`, `TotalBalance`) VALUES ('Indirect Referral','$inviteeUpline','$inviteeID','$inviteName','$invitee','10','$updatedBalance')";
      mysqli_query($conn, $sqlinsertTransact2);

      
      $uplineId = $inviteeID;
    }
       
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <!-- <link rel="stylesheet" href="./dist/output.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <!-- <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <title>Admin</title>
    <script src="../js/tailwind-3.1.8.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../node_modules/tw-elements/dist/js/index.min.js"></script>
    <!-- <script src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <title>Arvie Cosmetic & Skincare  ProductsTrading</title>

    <style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/* text-gray-700 */
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 1px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #A1A1AA;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
        .dataTables_length label select{
            border: 1px solid #A1A1AA;
            padding-left: 20px;
            padding-right: 20px;
        }


        @media screen and (max-width: 1023px) {
            .user-members-content-container{
                min-height: calc(100vh - 65px);
            }
        }
        @media screen and (min-width: 1024px) {
            .user-members-content-container {
                width: calc(100vw - 256px);
            }
            .navbar div .nav-items ul li {
                position: relative;
                padding: 0 25px;
                margin-left: 0 !important;
            }
            .navbar div .nav-items ul li:not(:last-child):after {
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                content: "";
                width: 1px;
                height: 10px;
                background-color: #374151;
            }
            .content-container{
                min-height: calc(100vh - 73px);
            }
        }
        @media screen and (min-width: 1280px) {
            .user-members-content-container{
                padding: 0 25px;
                margin-left: 0 !important;
            }
            .navbar div .nav-items ul li:not(:last-child):after {
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                content: "";
                width: 1px;
                height: 10px;
                background-color: #374151;
            }
        }
    </style>
</head>
<body>
  <?php include_once "./admin-header.php"; ?>
  <div class="content-container lg:flex lg:flex-row w-full">
    <div class="display-none lg:display-block lg:w-1/4 xl:w-1/5 2xl:w-1/5">
      <?php include_once "./admin-nav.php"; ?>
    </div>
    <div class="user-members-content-container pt-5 px-6 pb-5 bg-emerald-100 w-full lg:w-3/4 xl:w-4/5 2xl:w-4/5">
        
        <!--Container-->
        <div class="container w-full mx-auto px-2">

            <!--Title-->
            <h1 class="font-sans font-bold text-black px-2 lg:mb-3 text-5xl text-center ">
                Members
            </h1>


            <!--Card-->
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                <table id="membersTable" class="stripe hover nowrap row-border dt-body-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Name</th>
                            <th data-priority="2">Role</th>
                            <th data-priority="3">Rebate Points</th>
                            <th data-priority="4">Total Earnings</th>
                            <th data-priority="5">Upline</th>
                            <th data-priority="6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- i Loop lang yung data dito -->
                        <tr>
                            <td class="text-center">Cedrick Orozo</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">3</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Kevin Marero</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <!-- end -->


                        <tr>
                            <td class="text-center">John Arian Malondras</td>
                            <td class="text-center">Reseller</td>
                            <td class="text-center">5</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Cedrick Orozo</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>


                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>


                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>
                        <tr>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Stockist</td>
                            <td class="text-center">10</td>
                            <td class="text-center">₱ 999,999,999.00</td>
                            <td class="text-center">Nathan Nemedez</td>
                            <td><a class="mr-2 text-blue-500 text-center" href="#" data-memberId="">Edit</a><a class="ml-2 text-red-500" href="#" data-memberId="">Remove</a></td>
                        </tr>

                    </tbody>

                </table>


            </div>
            <!--/Card-->


        </div>
        <!--/container-->

    </div>

    <script>
        $(document).ready(function(){
            $("#members").addClass("bg-emerald-700");
            $("#members").addClass("text-white");
            $("#members").removeClass("text-gray-600");

            var table = $('#membersTable').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
        });
    </script>
</body>
</html>
