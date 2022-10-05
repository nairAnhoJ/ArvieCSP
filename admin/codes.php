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
            .user-code-content-container{
                min-height: calc(100vh - 65px);
            }
        }
        @media screen and (min-width: 1024px) {
            .user-code-content-container {
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
            .user-code-content-container{
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
    <div class="user-code-content-container pt-5 px-6 pb-5 bg-emerald-100 w-full lg:w-3/4 xl:w-4/5 2xl:w-4/5">
        
        <!--Container-->
        <div class="container w-full mx-auto px-2">

            <!--Title-->
            <h1 class="font-sans font-bold text-black px-2 lg:mb-3 text-5xl text-center ">
                Codes
            </h1>
            <div class="relative text-center mt-3 lg:mt-1 h-10 lg:h-16">
                <button type="button" class="m-auto lg:absolute lg:right-0 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-lg px-5 py-3 mr-2 mb-2 focus:outline-none">Generate New Codes</button>
            </div>

            <!--Table-->
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-white">
                <table id="codeTable" class="stripe hover nowrap row-border dt-body-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Date</th>
                            <th data-priority="2">Tran. No.</th>
                            <th data-priority="3">Member Name</th>
                            <th data-priority="4">Type</th>
                            <th data-priority="5">Code Count</th>
                            <th data-priority="6">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- i Loop lang yung data dito -->
                        <tr>
                            <td class="text-center">10/05/2022</td>
                            <td class="text-center">10050003</td>
                            <td class="text-center">John Arian Malondras</td>
                            <td class="text-center">Botanical</td>
                            <td class="text-center">20</td>
                            <td class="text-center">
                                <button class="text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                            <path d="M2486 5097 c-70 -40 -76 -63 -76 -302 0 -236 6 -260 69 -302 71 -48 175 -20 213 57 15 30 18 65 18 243 0 240 -8 270 -80 307 -51 26 -95 25 -144 -3z"/>
                                            <path d="M1345 4893 c-91 -23 -131 -132 -84 -226 47 -92 193 -343 213 -365 49 -55 134 -69 194 -32 44 27 76 98 67 148 -7 36 -202 389 -239 431 -37 41 -94 58 -151 44z"/>
                                            <path d="M3675 4886 c-16 -7 -39 -24 -51 -37 -37 -42 -232 -395 -239 -431 -9 -50 23 -121 67 -148 60 -37 145 -23 194 32 20 22 166 273 213 365 38 76 23 159 -38 202 -38 27 -107 35 -146 17z"/>
                                            <path d="M2320 3874 c-14 -2 -65 -9 -115 -15 -708 -86 -1481 -485 -2027 -1047 -236 -243 -236 -261 0 -504 526 -541 1204 -903 1938 -1035 137 -24 171 -27 429 -27 293 -1 340 3 579 50 516 102 1051 361 1521 737 132 106 426 400 454 454 47 93 25 137 -157 325 -570 586 -1337 972 -2107 1058 -83 9 -458 12 -515 4z m445 -313 c383 -79 681 -364 787 -752 19 -72 23 -109 23 -249 0 -140 -4 -177 -23 -249 -101 -371 -376 -647 -741 -743 -97 -25 -299 -35 -401 -19 -505 78 -870 502 -870 1011 0 498 350 917 845 1008 89 17 282 13 380 -7z m1150 -347 c248 -137 540 -352 740 -546 l110 -106 -55 -57 c-190 -197 -518 -442 -798 -599 -128 -72 -296 -150 -286 -133 5 6 27 41 50 77 93 146 161 322 189 490 19 122 19 330 -1 445 -29 168 -97 342 -188 485 -23 36 -45 71 -50 77 -9 16 160 -62 289 -133z m-2425 131 c0 -2 -20 -35 -44 -72 -63 -99 -103 -181 -141 -296 -47 -141 -65 -257 -65 -417 0 -264 67 -496 204 -710 23 -36 45 -70 49 -77 11 -17 -184 76 -321 153 -249 141 -518 342 -712 531 l-105 103 95 93 c260 254 622 506 943 658 82 38 97 43 97 34z"/>
                                            <path d="M2433 3055 c-226 -61 -383 -264 -383 -495 0 -279 231 -510 510 -510 329 0 577 318 495 635 -71 272 -356 441 -622 370z m205 -301 c78 -32 132 -111 132 -194 0 -113 -97 -210 -210 -210 -146 0 -250 155 -194 288 44 107 168 160 272 116z"/>
                                            <path d="M1525 860 c-35 -14 -70 -62 -157 -215 -119 -209 -128 -229 -128 -275 0 -133 163 -199 252 -102 38 41 236 394 243 434 9 50 -23 121 -67 148 -34 21 -105 26 -143 10z"/>
                                            <path d="M3452 850 c-44 -27 -76 -98 -67 -148 7 -40 205 -393 243 -434 49 -53 133 -60 194 -16 60 42 75 125 37 201 -47 92 -193 343 -213 365 -49 55 -134 69 -194 32z"/>
                                            <path d="M2479 627 c-63 -42 -69 -66 -69 -302 0 -239 6 -262 76 -302 49 -28 93 -29 144 -3 72 37 80 67 80 307 0 178 -3 213 -18 243 -25 50 -75 80 -132 80 -32 0 -58 -7 -81 -23z"/>
                                        </g>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!-- end -->

                        <tr>
                            <td class="text-center">10/04/2022</td>
                            <td class="text-center">10040002</td>
                            <td class="text-center">Kevin Marero</td>
                            <td class="text-center">Kapenato & Cereal</td>
                            <td class="text-center">10</td>
                            <td class="text-center">
                                <button class="text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                            <path d="M2486 5097 c-70 -40 -76 -63 -76 -302 0 -236 6 -260 69 -302 71 -48 175 -20 213 57 15 30 18 65 18 243 0 240 -8 270 -80 307 -51 26 -95 25 -144 -3z"/>
                                            <path d="M1345 4893 c-91 -23 -131 -132 -84 -226 47 -92 193 -343 213 -365 49 -55 134 -69 194 -32 44 27 76 98 67 148 -7 36 -202 389 -239 431 -37 41 -94 58 -151 44z"/>
                                            <path d="M3675 4886 c-16 -7 -39 -24 -51 -37 -37 -42 -232 -395 -239 -431 -9 -50 23 -121 67 -148 60 -37 145 -23 194 32 20 22 166 273 213 365 38 76 23 159 -38 202 -38 27 -107 35 -146 17z"/>
                                            <path d="M2320 3874 c-14 -2 -65 -9 -115 -15 -708 -86 -1481 -485 -2027 -1047 -236 -243 -236 -261 0 -504 526 -541 1204 -903 1938 -1035 137 -24 171 -27 429 -27 293 -1 340 3 579 50 516 102 1051 361 1521 737 132 106 426 400 454 454 47 93 25 137 -157 325 -570 586 -1337 972 -2107 1058 -83 9 -458 12 -515 4z m445 -313 c383 -79 681 -364 787 -752 19 -72 23 -109 23 -249 0 -140 -4 -177 -23 -249 -101 -371 -376 -647 -741 -743 -97 -25 -299 -35 -401 -19 -505 78 -870 502 -870 1011 0 498 350 917 845 1008 89 17 282 13 380 -7z m1150 -347 c248 -137 540 -352 740 -546 l110 -106 -55 -57 c-190 -197 -518 -442 -798 -599 -128 -72 -296 -150 -286 -133 5 6 27 41 50 77 93 146 161 322 189 490 19 122 19 330 -1 445 -29 168 -97 342 -188 485 -23 36 -45 71 -50 77 -9 16 160 -62 289 -133z m-2425 131 c0 -2 -20 -35 -44 -72 -63 -99 -103 -181 -141 -296 -47 -141 -65 -257 -65 -417 0 -264 67 -496 204 -710 23 -36 45 -70 49 -77 11 -17 -184 76 -321 153 -249 141 -518 342 -712 531 l-105 103 95 93 c260 254 622 506 943 658 82 38 97 43 97 34z"/>
                                            <path d="M2433 3055 c-226 -61 -383 -264 -383 -495 0 -279 231 -510 510 -510 329 0 577 318 495 635 -71 272 -356 441 -622 370z m205 -301 c78 -32 132 -111 132 -194 0 -113 -97 -210 -210 -210 -146 0 -250 155 -194 288 44 107 168 160 272 116z"/>
                                            <path d="M1525 860 c-35 -14 -70 -62 -157 -215 -119 -209 -128 -229 -128 -275 0 -133 163 -199 252 -102 38 41 236 394 243 434 9 50 -23 121 -67 148 -34 21 -105 26 -143 10z"/>
                                            <path d="M3452 850 c-44 -27 -76 -98 -67 -148 7 -40 205 -393 243 -434 49 -53 133 -60 194 -16 60 42 75 125 37 201 -47 92 -193 343 -213 365 -49 55 -134 69 -194 32z"/>
                                            <path d="M2479 627 c-63 -42 -69 -66 -69 -302 0 -239 6 -262 76 -302 49 -28 93 -29 144 -3 72 37 80 67 80 307 0 178 -3 213 -18 243 -25 50 -75 80 -132 80 -32 0 -58 -7 -81 -23z"/>
                                        </g>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">10/03/2022</td>
                            <td class="text-center">10030001</td>
                            <td class="text-center">Cedrick Orozo</td>
                            <td class="text-center">Direct Invite</td>
                            <td class="text-center">5</td>
                            <td class="text-center">
                                <button class="text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                            <path d="M2486 5097 c-70 -40 -76 -63 -76 -302 0 -236 6 -260 69 -302 71 -48 175 -20 213 57 15 30 18 65 18 243 0 240 -8 270 -80 307 -51 26 -95 25 -144 -3z"/>
                                            <path d="M1345 4893 c-91 -23 -131 -132 -84 -226 47 -92 193 -343 213 -365 49 -55 134 -69 194 -32 44 27 76 98 67 148 -7 36 -202 389 -239 431 -37 41 -94 58 -151 44z"/>
                                            <path d="M3675 4886 c-16 -7 -39 -24 -51 -37 -37 -42 -232 -395 -239 -431 -9 -50 23 -121 67 -148 60 -37 145 -23 194 32 20 22 166 273 213 365 38 76 23 159 -38 202 -38 27 -107 35 -146 17z"/>
                                            <path d="M2320 3874 c-14 -2 -65 -9 -115 -15 -708 -86 -1481 -485 -2027 -1047 -236 -243 -236 -261 0 -504 526 -541 1204 -903 1938 -1035 137 -24 171 -27 429 -27 293 -1 340 3 579 50 516 102 1051 361 1521 737 132 106 426 400 454 454 47 93 25 137 -157 325 -570 586 -1337 972 -2107 1058 -83 9 -458 12 -515 4z m445 -313 c383 -79 681 -364 787 -752 19 -72 23 -109 23 -249 0 -140 -4 -177 -23 -249 -101 -371 -376 -647 -741 -743 -97 -25 -299 -35 -401 -19 -505 78 -870 502 -870 1011 0 498 350 917 845 1008 89 17 282 13 380 -7z m1150 -347 c248 -137 540 -352 740 -546 l110 -106 -55 -57 c-190 -197 -518 -442 -798 -599 -128 -72 -296 -150 -286 -133 5 6 27 41 50 77 93 146 161 322 189 490 19 122 19 330 -1 445 -29 168 -97 342 -188 485 -23 36 -45 71 -50 77 -9 16 160 -62 289 -133z m-2425 131 c0 -2 -20 -35 -44 -72 -63 -99 -103 -181 -141 -296 -47 -141 -65 -257 -65 -417 0 -264 67 -496 204 -710 23 -36 45 -70 49 -77 11 -17 -184 76 -321 153 -249 141 -518 342 -712 531 l-105 103 95 93 c260 254 622 506 943 658 82 38 97 43 97 34z"/>
                                            <path d="M2433 3055 c-226 -61 -383 -264 -383 -495 0 -279 231 -510 510 -510 329 0 577 318 495 635 -71 272 -356 441 -622 370z m205 -301 c78 -32 132 -111 132 -194 0 -113 -97 -210 -210 -210 -146 0 -250 155 -194 288 44 107 168 160 272 116z"/>
                                            <path d="M1525 860 c-35 -14 -70 -62 -157 -215 -119 -209 -128 -229 -128 -275 0 -133 163 -199 252 -102 38 41 236 394 243 434 9 50 -23 121 -67 148 -34 21 -105 26 -143 10z"/>
                                            <path d="M3452 850 c-44 -27 -76 -98 -67 -148 7 -40 205 -393 243 -434 49 -53 133 -60 194 -16 60 42 75 125 37 201 -47 92 -193 343 -213 365 -49 55 -134 69 -194 32z"/>
                                            <path d="M2479 627 c-63 -42 -69 -66 -69 -302 0 -239 6 -262 76 -302 49 -28 93 -29 144 -3 72 37 80 67 80 307 0 178 -3 213 -18 243 -25 50 -75 80 -132 80 -32 0 -58 -7 -81 -23z"/>
                                        </g>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <!--/Table-->
        </div>
        <!--/container-->

    </div>

    <script>
        $(document).ready(function(){
            $("#code").addClass("bg-emerald-700");
            $("#code").addClass("text-white");
            $("#code").removeClass("text-gray-600");

            var table = $('#codeTable').DataTable({
                // 'columnDefs': [{ 'orderable': false, 'targets': 0 }],
                // 'aaSorting': [[1, 'desc']],
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
        });
    </script>
</body>
</html>
