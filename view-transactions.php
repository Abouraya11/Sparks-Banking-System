<head>
    <title>View Transactions History</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/view-users.css">
    <link rel="icon" href="../assets/images/Grip logo.png" />
     <style type="text/css">.disclaimer { display: none; }</style>
</head>

<body>
    <?php include('nav-bar.php') ?>

    <h1
        style="font-size:35px; font-weight:500; margin-left:110px; border-bottom: 2px solid black; width:80%; margin-top:20px;">
        Transactions History</h1>
    <div class="relative overflow-x-auto shadow-md rounded-lg"
        style="margin-left: 110px; margin-top: 60px; width: 80%; margin-bottom:60px;">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="margin-left: 0px;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Sender</th>
                    <th scope="col" class="px-6 py-3">Reciver</th>
                    <th scope="col" class="px-6 py-3">Amount ($)</th>
                    <th  scope="col" class="px-6 py-3">Date / Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
         
 include('config.php');
   $sql="SELECT * FROM transactions";
   $result=$conn->query($sql);
   while($row=$result->fetch_assoc()){
 Echo "
           <tr style='padding-right: 10px;'
            class='border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700' 
          >
            <th 
              scope='row'
              class='px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap'
            >
             ". $row["transaction_id"] ."
            </th>
            <td class='px-6 py-4'>". $row["sender"] ."</td>
            <td class='px-6 py-4'>". $row["receiver"] ."</td>
            <td class='px-6 py-4'>". $row["amount"] ."</td>
			 <td class='-px-4 py-4'>". $row["datetime"] ."</td>
          </tr>";
   }
           ?>
            </tbody>
        </table>
    </div>
    <?php include('footer.php') ?>
</body>

</html>