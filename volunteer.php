<?php 
include "header.php"; 
$conn = connectMyDB();
$sql = "select * from otp";
$result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
?>
<div class="topbar pt-3" style="background:#424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">Volunteer</span>
</div>

<!--get userwise data from database-->
<!--get userwise data from database-->
<nav class="navigationbar" style="background-color:#53efd9; style="overflow-x:hidden;"">
      <!--<div class="p-4 fs-5">-->
      <!-- <label for="all">Volunteer</label>-->
      <!-- <input type="checkbox" name="" class="checkbox_check" id="allDetails" onclick="GetReport('Volunteer','allrec')">-->
      <!--</div>-->
      <!-- data-bs-toggle="collapse" href="#collapseExample" -->
      <!-- multilevel dropdown starts -->
      <div class="dropdown p-4 fs-5" id="myDropdown">
      <a class="dropdown-toggle fs-10 btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="color:white; text-decoration:none; background-color:#033b40;">Select Filter Option</a>
       <button class="btn" style="background-color:#033b40; color:white;" id="selectAll">Select All</button>
       <button class="btn" style="background-color:#033b40; color:white;" id="sendEmailBtn">Send Email</button>
  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" id="all" onclick="GetReport('allRecords','allrec')">All</a></li>
    <li><a class="dropdown-item">District &raquo;</a>
      <ul class="dropdown-menu dropdown-submenu submenu1">
         <?php
         $selectQuery="SELECT DISTINCT `District` FROM `center_list` order by `District`";
         $con = connectMyDB();
         $queryPass=mysqli_query($con,$selectQuery);
         while( $result = mysqli_fetch_assoc($queryPass)){
          ?>
        <li><a class="dropdown-item showing" id="result"  onclick="GetReport('district','<?php echo $result['District']?>');"><?php echo $result["District"] ?></a> </li>
        <?php
         }
        ?>
      </ul>
    </li>
    <li><a class="dropdown-item" href="#">Education &raquo;</a>
        <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
       
         $selectQuery1="SELECT DISTINCT `education` FROM `education`";
         $con = connectMyDB();
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Education','<?php echo $result['education']?>');"><?php echo $result["education"] ?></a> </li>
        <?php
         }
        ?>
        </ul>
    </li>
    <li><a class="dropdown-item" href="#">Department &raquo;</a>
    
      <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
       
         $selectQuery1="SELECT DISTINCT `department` FROM `department` order by department";
         $con = connectMyDB();
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Department','<?php echo $result['department']?>');"><?php echo $result["department"] ?></a> </li>
        <?php
         }
        ?>
        </ul>
    </li>
    <a class="dropdown-item" href="#" id="showRange">Age Group</a>
    <li><a class="dropdown-item" href="#">Experience &raquo;</a>
    <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
        $con = connectMyDB();
         $selectQuery1="SELECT DISTINCT `department_name` FROM `servicedepartment` where experience='1'";
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Experience','<?php echo $result['department_name']?>');"><?php echo $result["department_name"] ?></a> </li>
        <?php
         }
        ?>
        </ul>
    </li>
    <li><a class="dropdown-item" href="#">Interest &raquo;</a>
    <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
       
        //  $selectQuery1="SELECT DISTINCT `experience` FROM `experience`";
        $selectQuery1="SELECT DISTINCT `department_name` FROM `servicedepartment` where interest='1'";
         $con = connectMyDB();
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Interest','<?php echo $result['department_name']?>');"><?php echo $result["department_name"]?></a></li>
        <?php
         }
        ?>
        </ul>
  
  </li>
    <li><a class="dropdown-item">Center(AGPS) &raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `center` FROM `center_list` order by `center`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Center','<?php echo $result['center']?>');"><?php echo $result["center"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  <li><a class="dropdown-item">Gender Wise&raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `rGender` FROM `introductiondetails` order by `rGender`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Gender','<?php echo $result['rGender']?>');"><?php echo $result["rGender"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  <li><a class="dropdown-item">Region&raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `reason` FROM `agps` order by `reason`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('region','<?php echo $result['reason']?>');"><?php echo $result["reason"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  <li><a class="dropdown-item">Occupation&raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `rEducation` FROM `introductiondetails` order by `rEducation`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('occupation','<?php echo $result['rEducation']?>');"><?php echo $result["rEducation"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  </ul>
</div>   <!-- multilevel dropdown ended -->
<div class="age-grp">
 <label for="" class="fs-5">From:</label>
 <input type="text" name="from" id="from_range">
 <label for="" class="fs-5">To:</label>
 <input type="text" name="to" id="to_range">
 <input type="submit" value="Submit" onclick="GetReportBy('ageGrp')"> 
</div>
<!--<div class="text-end ms-3" style="position:absolute; right:1rem;"><a href="index_dashboard.php" style="text-decoration:none;color:black"><i class="fa-solid fa-house-user"></i> Dashboard</a></div>-->
</nav>

<div class="" id="collapseExample"  style="padding:10px;">
    <!--style="display:none;"-->
<table class="fixedTable" id="reportTable">
   <thead>
      <tr>
         <!--<th>Sno</th>-->
         <th>Action</th>
         <th>Image</th>
         <th>UserID</th>
         <th>Role</th>
         <th style="width:100px;">Nepali Name</th>
         <th style="width:100px;">English Name</th>
         <th style="width:150px;">Date Of Birth in B.S</th>
         <th style="width:150px;">Date Of Birth in A.D</th>
         <th>Age</th>
         <th>Gender</th> 
         <th>Nationality</th>
         <th>Education</th>
         <th>Profession</th>
         <th style="width:100px;">Marital Status</th>
         <th style="width:100px;">Matri Bhasa</th>
         <th style="width:100px;">Nagrikta No.</th>
         <th style="width:150px;">Permanent Address</th>
         <th style="width:150px;">Temporary Address</th>
         <th>Telephone</th>
         <th>Mobile</th>
         <th>Email</th>
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
        <input type="hidden" id="userEmail" value="<?php echo $_SESSION['username']; ?>">
      <?php 
        $username = $_SESSION['username'];
      $selectQuery="SELECT introductiondetails.id,introductiondetails.rUser_Id,introductiondetails.rRole,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  introductiondetails.rRole='Volunteer' AND active_status = 1;;";
      $conn = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($conn,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td style="width:100px; padding-top:20px; display:flex; justify-content:space-evenly; ">
             <a href="#"><input type="checkbox" class="emailChecked" name="emailSend" value="I am a checked"></a>
             <a href="../../report.php?ids=<?php echo $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
             <a href="edit/index.php?id=<?php echo $result['id']?>"><i class="fas fa-edit" style="color:black; font-size:18px;"></i></a>
             <a href="volunteerDelete.php?id=<?php echo $result['id'] ?>"><i class="fa fa-trash" aria-hidden="true" style="color:black; font-size:18px;"></i></a>
<!--             <a href="updatepages/updatepage.php?id=<?php echo $result['id']; ?>&amp;sid=<?php echo 2; ?>">-->
<!--  <i class="fa-solid fa-edit" style="color: black; font-size: 20px;"></i>-->
<!--</a>-->
         </td>
         <td><img src="<?php $img1 = $result['imagepath'] . $result['image']; echo $img1; ?>" onerror="this.src='../../user_icon.png'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>
         <td><?php echo $result['rUser_Id']; ?></td>
         <td><?php echo $result['rRole']; ?></td>
         <td><?php echo $result['rName']; ?></td>
         <td><?php echo $result['rNameCapital']; ?></td>
         <td><?php echo $result['rDOB']; ?></td>
         <td><?php echo $result['eDate']; ?></td>
         <td><?php echo $result['rAge']; ?></td>
         <td><?php echo $result['rGender']; ?></td>
         <td><?php echo $result['rNational']; ?></td>
         <td><?php echo $result['rEducation']; ?></td>
         <td><?php echo $result['rProfession']; ?></td>
         <td><?php echo $result['rMarital']; ?></td>
         <td><?php echo $result['rMotherToungue']; ?></td>
         <td><?php echo $result['rCitizenshipNo']; ?></td>
         <td><?php echo $result['pd']; ?></td>
         <td><?php echo $result['cd']; ?></td>
         <td><?php echo $result['rTelephoneNo']; ?></td>
         <td id="onlyMobile"><?php echo $result['rMobileNo']; ?></td>
         <td><?php echo $result['rEmail']; ?></td>
      </tr>
      <?php
        }
        $i++;
      ?>
   </tbody>
 </table> 
 <input type="hidden" id="tokenID" value="<?php echo $row['tokenNumber'];?>">
                <input type="hidden" id="fromSender" value="<?php echo $row['fromSender'];?>">
                <input type="hidden" id="smsApi" value="<?php echo $row['api'];?>">
</div>
 <script>
  
  function GetReport(ReportBy,Value){
    $.ajax({
               url:"../../volunteerGen.php",
               method:"POST",
               data:{reportBy:ReportBy,param:Value},
               success: function (data) {
                   $("#tbody_1").empty();
                   var da = JSON.parse(data);
                   if(da.status_code == 200) {
                   $("#tbody_1").append(da.data);
                   }else if(da.status_code == 404) {
                     var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
                     $("#tbody_1").append(html);
                   }
                 
                   }
               });
             
  }
  function GetReportBy(ReportBy){
    var from = $("#from_range").val();
    var to = $("#to_range").val();
    $.ajax({
               url:"volunteerGen.php",
               method:"POST",
               data:{reportBy:ReportBy,from:from,to:to},
               success: function (data) {
                   $("#tbody_1").empty();
                   var da = JSON.parse(data);
                   if(da.status_code == 200) {
                   $("#tbody_1").append(da.data);
                   }else if(da.status_code == 404) {
                     var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
                     $("#tbody_1").append(html);
                   }
                 
                   }
               });
 $('#collapseExample').css("display","block");
  }


   $(document).ready( function () {
    getTokenID = $("#tokenID").val();
            getFromSender = $("#fromSender").val();
            smsApi = $("#smsApi").val();
            alert(getTokenID+" "+getFromSender+""+smsApi);

    $('#reportTable').DataTable({
       //     sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: false,
    
    // fixedColumns: {
    //     left:0,
    //     right: 1,
    // },
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 450,
    
    paging: false,
    // order:[[5,'desc']],
    // searching: false,
    dom: "Bfrtip",
   });

 $('#all').click(function () {
  $('#collapseExample').css("display","block");
  $('input[name="' + this.name + '"]').not(this).prop('checked', true);
  $(".age-grp").css("display", "none");
 });


$("#showRange").click(function() {
  $(".age-grp").css("display", "block");
});

$('.showing').click(function() {
  $('#collapseExample').css("display","block");
  $(".age-grp").css("display", "none");
});

$("#allDetails").click(function() {
  if ($('.checkbox_check').prop('checked')==true){
    $('#collapseExample').css("display","block");
    $(".age-grp").css("display", "none");

  }else{
    $('#collapseExample').css("display","none");
    $(".age-grp").css("display", "none");
     location.reload();
  }

})


$("#dropdownMenuButton").click(function() {
  $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  $('.showByFilter').attr('id', 'tbody_1');
});
});

// check box for sending data in mail 
// check box for sending data in mail 
$(document).ready(function(){
//  $("#emailChecked").change(function() {
//      if($("#emailChecked").is(":checked")){
//       var emailChecked = $(this).val();
//     // var rowData = $(this).closest("tr").find("td:not(:first-child)").map(function() {
//     //         return $(this).text();
//     //      }).get();
//     //   alert("Checkbox value: " +  rowData.join(", "));
    
//      alert("Checkbox value: " + emailChecked);
//      }
//   });

 $("#sendEmailBtn").click(function() {
     alert("you clicked me");
      var selectedData = [];
      let onlyMobile = $("#onlyMobile").text().trim();
      // $(".emailChecked:checked").each(function() {
      //    var rowData = $(this).closest("tr").find("td:nth-child(20)").map(function() {
      //       return $(this).text();
      //    }).get();
      //    selectedData.push(rowData);
      //         alert(selectedData.join(", "));
      //   // let onlyMobile = $("#onlyMobile").text().trim();
      // });
      
      $(".emailChecked:checked").each(function() {
        var rowData = $(this).closest("tr").find("td:nth-child(20)").text();
        selectedData.push(rowData);
      });
      var selectedNumber = selectedData.join(", ")
      alert(selectedNumber);

      if (selectedNumber.length > 0) {
        alert("i am a sparrow sms");
         $.ajax({
            url: "sendNumber.php",
            type: "POST",
            data: { selectedNumber: selectedNumber, getTokenID: getTokenID, getFromSender: getFromSender, smsApi: smsApi},
            success: function(response) {
              alert(response);
              alert("Message sent successfully");
            }
         });
      } else {
         alert("No data selected.");
      }
  });
  
    //   start select all checkbox option at a time 
    //   start select all checkbox option at a time 
   var isChecked = false;

    $('#selectAll').click(function() {
        isChecked = !isChecked;
        $('.emailChecked').prop('checked', isChecked);
        return false; // Prevent default behavior of the button click
    });
    // end select all checkbox option at a time
    // end select all checkbox option at a time
});
 </script>
<!--get userwise data from database-->
<!--get userwise data from database-->

<?php include "footer.php"; ?>