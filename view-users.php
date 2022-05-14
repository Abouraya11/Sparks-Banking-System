<head>
    <title>View All Users</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/homepage.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/view-users.css">
    <link rel="icon" href="../assets/images/Grip logo.png" />
     <style type="text/css">.disclaimer { display: none; }</style>
</head>

<body>

    <?php include('nav-bar.php') ?>
    <h1
        style="font-size:35px; font-weight:500; margin-left:110px; border-bottom: 2px solid black; width:80%; margin-top:20px;">
        All Users</h1>
    <div class="relative overflow-x-auto shadow-md rounded-lg"
        style="margin-left: 110px; margin-top: 60px; width: 80%; margin-bottom:60px;">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="margin-left: 0px;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400";>
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Balance ($)</th>
                    <th scope="col" class="px-14 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
    include('config.php');
   $sql="SELECT * FROM users";
   $result=$conn->query($sql);
   while($row=$result->fetch_assoc()){
	   $id=$row["id"];
 Echo "
           <tr
            class='border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700'
          >
            <th
              scope='row'
              class='px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap'
            >
             ". $row["id"] ."
            </th>
            <td class='px-6 py-4'>". $row["name"] ."</td>
            <td class='px-6 py-4'>". $row["email"] ."</td>
            <td class='px-6 py-4'>". $row["balance"] ."</td>
            <td class='px-6 py-4'>
              <a
       
                href='transact.php?id=$id'
                class='font-medium text-blue-600 dark:text-blue-500 hover:underline'
                >Transact</a
              >
            </td>
          </tr>";
   }
     ?>
            </tbody>
        </table>
    </div>
    <?php include('footer.php') ?>
</body>

</html>