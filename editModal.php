<?php 
include "conn.php";
$id = $_POST['sgid'];
$query = "SELECT *,sg.id as sgid, sb.id as subid, c.id as clasid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
                            FROM tblstudentgrade sg
                            LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
                            AND sg.studentid = sc.studentid
                            AND sg.subjectid = sc.subjectid
                            LEFT JOIN usertbl s ON sg.studentid = s.id
                            LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
                            LEFT JOIN usertbl t ON sg.adviserid = t.id
                            LEFT JOIN tblclass c ON sg.classid = c.id
                            LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
                            where sg.id='$id'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

$query = "SELECT * FROM tblschoolyear where status=0";
$resultsy = mysqli_query($con, $query)or die(mysqli_error($con));
$rowsy = mysqli_fetch_array($resultsy);
?>
<form action="crud_function.php" method="post">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 style="margin:0px;" class="modal-title"><i class="fa fa-edit fa-lg"></i> Edit Student Grade</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" value="<?php echo $row['sgid'] ?>" name="hidden_id" id="hidden_id"/>
            <input type="hidden" value="<?php echo $rowsy['id']; ?>" name="txt_edit_sy" id="txt_edit_sy"/>
            <input type="hidden" value="<?php echo $row['classid']; ?>" name="txt_edit_class" id="txt_edit_class"/>
            <input type="hidden" value="<?php echo $row['subid']; ?>" name="txt_edit_subj" id="txt_edit_subj"/>
            <div class="form-group">
                <label>Student: </label>
                <input readonly name="txt_edit_stud" id="txt_edit_stud" class="form-control input-sm" type="text" value="<?php echo $row['sname'] ?>" />
            </div>
            <div class="form-group">
                <label>Prelim: </label>
                <input name="txtprelim" id="txtprelim" class="form-control input-sm" type="number" value="<?php echo $row['prelim']; ?>" />
            </div>
            <div class="form-group">
                <label>Midterm: </label>
                <input name="txtmidterm" id="txtmidterm" class="form-control input-sm" type="number" value="<?php echo $row['midterm']; ?>" />
            </div>
            <div class="form-group">
                <label>Pre Final: </label>
                <input name="txtprefi" id="txtprefi" class="form-control input-sm" type="number" value="<?php echo $row['prefi']; ?>" />
            </div>
            <div class="form-group">
                <label>Final: </label>
                <input name="txtfinal" id="txtfinal" class="form-control input-sm" type="number" value="<?php echo $row['final']; ?>" />
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_update_studgrade" value="Save"/>
        </div>
    </div>
</div>
</form>
