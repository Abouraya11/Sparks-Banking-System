 <?php include('config.php') ?>

 <head>
     <title>Transfer Money</title>
     <link rel="stylesheet" type="text/css" href="stylesheets/transact.css">
     <link rel="icon" href="../assets/images/Grip logo.png" />
      <style type="text/css">.disclaimer { display: none; }</style>
 </head>

 <body>
     <?php include('nav-bar.php') ?>
     <h1
         style="font-size:35px; font-weight:500; margin-left:110px; border-bottom: 2px solid black; width:80%; margin-top:20px;">
         From / To</h1>
     <div class="relative overflow-x-auto shadow-md rounded-lg"
         style="margin-left: 110px; margin-top: 60px; width: 80%; margin-bottom:60px;">
         <table style=" margin-left:0px;" class="w-full text-sm text-left text-gray-500 dark:text-gray-400;">
             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                 <tr>
                     <th scope="col" class="px-6 py-3">ID</th>
                     <th scope="col" class="px-6 py-3">Name</th>
                     <th scope="col" class="px-6 py-3">Email</th>
                     <th scope="col" class="px-6 py-3">Balance</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                        
                        $id=$_GET['id'];
                        
                        $sql="SELECT * FROM users WHERE id=$id";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){
                        
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
                        </tr>";
                        }
                        
                        
                        
                        ?>
             </tbody>
         </table>
     </div>
     <div class="body-container">
         <form action="update.php" method="POST">
             <select name="to" id="to">
                 <option value="" selected hidden>Choose a receiver</option>
                 <?php
                        $sql="SELECT name FROM users";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){
                        echo "<option value=". $row[name] .">". $row[name] ."</option>";
                    }
                       
                        $id=$_GET['id'];
                        $sql1="SELECT * FROM users WHERE id=$id";
                        $result1=$conn->query($sql1);
                       echo "<input type='text' name='from' style='visibility: none; display:none;' value=". $result1->fetch_assoc()["name"] .">";    
                      echo "<input type='text' name='id' style='visibility: none; display:none;' value='$id'>";     
                        ?>
             </select>

             <input class="input-form" type="text" name="amount" placeholder="Amount">


             <a href="view-transactions.php"><button>Submit</button></a>

         </form>
     </div>
     <?php include('footer.php') ?>
 </body>

 </html>