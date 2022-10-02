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
    <title>Admin</title>
    <script src="../js/tailwind-3.1.8.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../node_modules/tw-elements/dist/js/index.min.js"></script>
    <title>Arvie Cosmetic & Skincare  ProductsTrading</title>

    <style>
        @media screen and (max-width: 767px) {
            .sales-dashboard{
                height: 66vh !important;
            }
        }
        @media screen and (min-width: 768px) {
            .user-dashboard-content-container {
                width: calc(100vw - 256px);
            }
            .bottom-content{
                height: calc(100% - 184px);
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
            .sales-dashboard{
                height: calc(33% - 15px) !important;
            }
        }
        @media screen and (min-width: 1280px) {
            .user-dashboard-content-container {
                width: calc(100vw - 288px);
            }
            .bottom-content{
                height: calc(100% - 216px);
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
        }
    </style>
</head>
<body>
  <?php include_once "./admin-header.php"; ?>
  <div class="md:flex md:flex-row w-full">
    <div class="display-none md:display-block md:w-1/4 2xl:w-1/5">
      <?php include_once "./admin-nav.php"; ?>
    </div>
    <div class="user-dashboard-content-container pt-5 px-6 pb-5 bg-emerald-100 w-full md:w-3/4 2xl:w-4/5">
        <!-- SALES -->
        <div class="sales-dashboard grid mb-5 rounded-lg border border-gray-200 shadow-sm md:grid-cols-4 shadow-xl">
            <figure class="flex flex-col justify-center items-center text-center bg-white rounded-t-lg border-b border-gray-200 md:rounded-t-none md:rounded-tl-lg md:border-r">
                    <h1 class="mb-2 font-black text-4xl md:text-2xl">Total Sales</h1>
                    <p class="mt-2 font-medium text-2xl md:text-xl">₱ 999,999,999.00</p>
            </figure>

            <figure class="flex flex-col justify-center items-center text-center bg-white border-b border-gray-200 md:border-r">
                    <h1 class="mb-2 font-black text-2xl md:text-xl">Sales Today</h1>
                    <p class="mt-2 font-medium text-xl">₱ 999,999,999.00</p>
            </figure>

            <figure class="flex flex-col justify-center items-center text-center bg-white border-b border-gray-200 md:border-b-0 md:border-r">
                    <h1 class="mb-2 font-black text-2xl md:text-xl">Sales This Month</h1>
                    <p class="mt-2 font-medium text-xl">₱ 999,999,999.00</p>
            </figure>

            <figure class="flex flex-col justify-center items-center text-center bg-white rounded-b-lg border-gray-200 md:rounded-br-lg">
                    <h1 class="mb-2 font-black text-2xl md:text-xl">Sales This Year</h1>
                    <p class="mt-2 font-medium text-xl">₱ 999,999,999.00</p>
            </figure>
        </div>

        <div style="height: 66%;" class="grid grid-rows-4 md:grid-rows-2 grid-cols-2 md:grid-cols-4 gap-4">
            <!-- MEMBERS -->
            <div class="order-first row-span-1 col-span-2 grid mb-6 rounded-lg border border-gray-200 shadow-sm grid-cols-2 shadow-xl w-full h-full">
                <figure class="flex flex-col justify-center items-center text-center bg-white rounded-l-lg border-b border-gray-200 md:rounded-t-none md:rounded-tl-lg border-r">
                    <h1 class="mb-2 font-black md:text-xl">Total Members</h1>
                    <p class="mt-2 font-medium">999,999</p>
                </figure>

                <figure class="flex flex-col justify-center items-center text-center bg-white border-b border-gray-200 rounded-r-lg">
                    <h1 class="mb-2 font-black md:text-md">New Members Today</h1>
                    <p class="mt-2 font-medium">999,999</p>
                </figure>
            </div>
            <!-- MEMBERS WITH MOST INVITES -->
            <div class="order-last md:order-12 row-span-2 col-span-2 grid mb-6 rounded-lg border border-gray-200 shadow-sm md:grid-cols-1 shadow-xl w-full h-full">
                <figure class="overflow-auto flex flex-col pt-2 text-center  bg-white rounded-l-lg border-b border-gray-200 md:rounded-t-none md:rounded-tl-lg md:border-r">
                    <h1 class="pb-2 font-black md:text-md sticky top-0 bg-white">Top Points Earner</h1>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">1. JOHN ARIAN MALONDRAS</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">2. CEDRICK JAMES OROZO</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">3. KEVIN ROY MARERO</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">4. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">5. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">6. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">7. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">8. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">9. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                    <span class="mt-2">
                        <p class="ml-5 inline-block font-medium float-left">10. C.J. Orozo</p>
                        <p class="mr-5 inline-block font-medium float-right">999</p>
                    </span>
                </figure>
            </div>
            <!-- PAYOUT -->
            <div class="md:order-last col-span-2 grid mb-6 rounded-lg border border-gray-200 shadow-sm grid-cols-2 shadow-xl w-full h-full">
                <figure class="flex flex-col justify-center items-center text-center bg-white rounded-l-lg border-b border-gray-200 md:rounded-t-none md:rounded-tl-lg border-r">
                    <h1 class="mb-2 font-black md:text-2xl">Total Payout</h1>
                    <p class="mt-2 font-medium">₱ 999,999,999.00</p>
                </figure>

                <figure class="flex flex-col justify-center items-center text-center bg-white border-b border-gray-200 rounded-r-lg">
                    <h1 class="mb-2 font-black md:text-lg">Payout This Month</h1>
                    <p class="mt-2 font-medium">₱ 999,999,999.00</p>
                </figure>
            </div>

        </div>
    </div>
</body>
</html>
