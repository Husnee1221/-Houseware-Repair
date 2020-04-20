 <!-- เราจะเริ่ม ตรง Tableน่ะ ส่วนตารางใคร ตารางมันน่ะ  -->
 <table id="example1" class="table table-bordered table-striped">
     <thead>
         <tr align="center">
             <th>#</th>
             <th>ID</th>
             <th>Name</th>
             <th>Phone</th>
             <th>Email</th>
             <th>Gender</th>
             <th>Position</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody align="center">

         <!-- อย่าลืม ใส่  $i=1; -->
         <?php

       $strSQL = "SELECT * FROM member WHERE adminID='1' ORDER BY adminID desc  ";

       $i = 1;
       $count = 1;

        ?>


         <!-- ตรงนี้ if ,while สังเกตดีๆน่ะ ต้องมา ใช้ ของตัวเอง ระบบของตัวเองใช้ ยังไง ก็ ใช้ ตามนั้น  -->

         <?php
     if($result = $db->query($strSQL)){
             while($objResult = $result->fetch_object()){
            ?>
         <!-- อย่าลืม ใส่  $count++; ถ้าไม่ใส่ เมื่อ popup ไม่สามารถดึงแต่ล่ะ แถว -->

         <td class="text-left"><?php echo $count++; ?></td>
         <td class="text-left"><?php echo $objResult->member_idcard; ?></td>
         <td class="text-left"><?php echo $objResult->member_fullname; ?></td>
         <td class="text-left"><?php echo $objResult->member_phone; ?></td>
         <td class="text-left"><?php echo $objResult->member_email; ?></td>
         <td class="text-left"><?php echo gender($objResult->member_gender); ?></td>
         <!--<td class="text-left"><?php echo position($objResult->member_pos); ?></td>-->
         <td class="text-left"><?php echo status($objResult->admin_id); ?></td>
         <td>

             <!-- อันนี้ใช้ data-toggle เพื่อ popup ได้ และดึงข้อมูลได้ ในหน้าเดียว -->

             <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                 data-target="#editpopup<?php echo $i; ?>">
                 <i class="fa fa-edit" title="Edit"></i> </button>

             <!-- อย่าพึ่งปิด </td> เพราะเราจะให้ popup ได้ และดึงข้อมูลได้ -->

             <div class="modal fade" id="editpopup<?php echo $i; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                     aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i>
                                 Edit Member</h4>
                         </div>

                         <div class="modal-body">

                             <!-- form ="check_edit.php" ที่เราจะลิงค์ หน้า เชค edit เมื่อ เราจะแก้ไข ข้อมูล -->

                             <form class="form-horizontal" method="post" action="check_edit.php">

                                 <input type="hidden" name="member_id" value=" <?php echo $objResult->member_id; ?>">


                                 <div class="form-group">
                                     <label class="control-label col-md-2">ID Student</label>
                                     <div class="col-md-4">
                                         <input type="text" class="form-control" id="member_idcard" name="member_idcard"
                                             value="  <?php echo $objResult->member_idcard; ?>">
                                     </div>
                                 </div>



                                 <label class="control-label col-md-2">Name Student</label>
                                 <div class="col-md-7">

                                     <input type="text" class="form-control" id="member_fullname" name="member_fullname"
                                         value="  <?php echo $objResult->member_fullname; ?>">


                                 </div>



                                 <div class="form-group">
                                     <label class="control-label col-md-2">Phone</label>
                                     <div class="col-md-4">
                                         <input type="text" class="form-control" id="member_phone" name="member_phone"
                                             value="  <?php echo $objResult->member_phone; ?>">

                                     </div>


                                     <div class="form-group">
                                         <label class="control-label col-md-2">Email</label>
                                         <div class="col-md-4">
                                             <input type="text" class="form-control" id="member_email"
                                                 name="member_email" value="  <?php echo $objResult->member_email; ?>">

                                         </div>
                                     </div>


                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                                 class="glyphicon glyphicon-remove"></i>
                                             Cancle</button>
                                         <button type="submit" class="btn btn-success"><i
                                                 class="glyphicon glyphicon-ok"></i>
                                             Edit</button>
                                     </div>
                             </form>
                         </div>
                     </div>
                 </div>

                 <!-- หลังจากสร้างหน้า form edit ได้แล้ว ห้ ปิด </td> และตามด้วย ปิด <php ตามนี้-->

         </td>
         </tr>

         <?php
                                    $i++;  
    }
               }
                   ?>

 </table>