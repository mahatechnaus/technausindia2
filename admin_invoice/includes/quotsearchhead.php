<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<?php
      $startDatevalue = date('Y-m-01');
      $endDatevalue = date('Y-m-t');
      // print_r($startDatevalue);
      // print_r($endDatevalue);
      ?>

<div class="container p-3 my-3 text-white" style="background-color:#088BC3;">
  <!-- search start  -->
  <form method="post" action="" name="searchform" id="searchform">
    <div class="row">
      <div class="col-md-3 col-sm-12">    
        <label>Customer</label>
        <select class="form-control select2" name="supplier" id="selectemp" tabindex="1" autofocus>
          <option>--Select Customer --</option>      
        </select>
      </div>

      <div class="col-md-3 col-sm-12">
        <label> Mobile </label>
        <input type="text" id="cust_mobile" name="cust_mobile"
         class="form-control" placeholder="Mobile" required>
      </div>
  
      <!-- date  -->
      <div class="col-md-2 col-sm-12">
        <label>Start Date
          <input type="date" id="startdate" class="form-control" name="startdate" value="<?php echo $startDatevalue; ?>">
        </label>
      </div>
      <div class="col-md-2 col-sm-12">

        <label>End Date
          <input type="date" id="enddate" class="form-control" name="enddate" value="<?php echo $endDatevalue; ?>">
        </label>

      </div>

      <div class="col-md-1 col-sm-12">
        </br>
        <div class="input-group">
            <button class="btn btn-md  fas fa-search" type="submit" name="search"></button>
        </div>
      </div>

      <div class="col-md-1 col-sm-12">
        </br>
        <div class="input-group">
          <button class="btn btn-sm" type="submit" name="loadall">Load All</button>
        </div>
      </div>
    </div>
  </form>
  <!-- search end  -->

</div>
<script>
  // $("#searchform").validate({
  //   rules: {
  //     employee: "required",
  //     startdate: "required",
  //     enddate: "required"
  //   },
  //   messages: {
  //     employee: "Please select supplier name!",
  //     startdate: "Please select start date",
  //     enddate: "Please select end date"

  //   }
  // });
</script>