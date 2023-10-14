<?php

include 'includes/db.php';

include 'includes/header.php';

include 'includes/navbar.php';



$sql= "SELECT * FROM users WHERE email = '$username'";

        $sql_run = mysqli_query($con, $sql);

        $row_a = mysqli_fetch_assoc($sql_run);

        $user_id= $row_a['id'];

?>





<div class="app-main__outer">

 <div class="app-main__inner">

    <div class="app-page-title">

        <div class="page-title-wrapper">

           <div class="page-title-heading">

                <div class="page-title-icon">

                     <i class="pe-7s-global">

                    </i>

                </div>

                <div>State Codes

                    <div class="page-title-subheading">Add, Edit, Delete state codes here

                    </div>

                </div>

            </div>

            <div class="page-title-actions">

             <button style="font-size:14px;" type="button" class="btn mr-3 mb-3 btn-primary" data-toggle="modal" data-target="#addcode">

                                          <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add State

                                        </button> 

              

            </div>

         </div>

    </div>        

                            

    <div class="tab-content">

        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">



        <?php            

        if(isset($_SESSION['SUCCESS']) && $_SESSION['SUCCESS'] !=''){

            echo '<div class="alert alert-success" role="alert"> '.$_SESSION['SUCCESS']. '</div>';

            unset($_SESSION['SUCCESS']);

        }

        if(isset($_SESSION['Failure']) && $_SESSION['Failure'] !=''){

            echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['Failure']. '</div>';

            unset($_SESSION['Failure']);

        }

        ?>



            <div class="main-card mb-3 card">

                <div class="card-body">





<?php

        

              



        $query = "SELECT * FROM statecode  WHERE user_id='$user_id' ORDER BY code DESC ";

        $query_run = mysqli_query($con, $query);

        

        

    ?>

      <table class="table table-striped table-bordered" id="table" >

        <thead align="center">

          <tr>

              <th> ID </th>

              <th>State Name</th>

              <th>State Code</th>

              <th>Edit</th>

              <th>Delete</th>

                            

          </tr>

        </thead>

        <tbody align="center">

        <?php

        

            while($row = mysqli_fetch_assoc($query_run))

            {

               ?>

          <tr>

            <td><?php  echo $row['state_id'] ?></td>

            <td><?php  echo $row['name'] ?></td>

            <td><?php  echo $row['code'] ?></td>

            <td>

                <form action="statecode_edit.php" method="post">

                    <input type="hidden" name="edit_id" value="<?php echo $row['state_id']; ?>">

                    <button  type="submit" name="edit_btn" class="btn btn-success"><i class="fa fa-pen"></i></button>

                </form>

            </td>

            <td>

            <button type="button" data-id1="<?php echo $row['state_id']; ?>" id="deletecode" class="btn btn-danger"><i class="fa fa-trash"></i></button>



            </td>

            

          </tr>

          <?php

      

            } 

        

        ?>

        </tbody>

      </table>







      </div>

             </div>

         </div>

     </div>   

</div>  





<?php

include('includes/footer.php');

?> 



<script>

     $(document).ready(function() {

    $('#table').DataTable({

        "lengthMenu": [[25, 200, 300, -1], [25, 200, 300, "All"]],

        "order": [[ 2, "asc" ]],

        "columnDefs": [

            {

                "targets": [ 0 ],

                "visible": false,

                "searchable": false

            },

        ]

    });

});



$(document).on('click', '#deletecode', function(){  

        var id=$(this).data("id1"); 

        if(confirm("Are you sure you want to delete this?"))  

           {  

                $.ajax({  

                     url:"deletecode.php",  

                     method:"POST",  

                     data:{id:id},  

                     dataType:"text",  

                     success:function(data){  

                          alert(data);  

                          location.reload();  

                     }  

                });  

           }  

      });

</script>

