<?php
include('../inc/config.php');

$queryu ="SELECT *FROM tblleads where id=".$_POST['id']."";
$result = $db->query($queryu);
?>
<table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>S No.</th>
            <th>Company Name</th>
            <th>Email Id</th>
            <th>Client Name</th>
            <th>Mobile No.</th>
            <th>Address</th>
            <th>Product</th>
            <th>Assing To</th>
            <th>Reg Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
            $ques ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
            $rstu = $db->query($ques);
            $rows=mysqli_fetch_array($rstu);

            //$ques ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
            //$rstu = $db->query($ques);
            //$rows=mysqli_fetch_array($rstu);
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><?php echo $row['company_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['client_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['product']; ?></td>
            <td><?php if($row['assign_to']!=''){ echo $row['assign_to'];}else{ echo 'Not Assing';} ?></td>
            <td><?php echo $row['regdate']; ?></td>
            <td>
            
            <a href="update-lead.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil" title="Edit"></i></a>
            <a class="" href="invoice-genrate.php?pid=<?php echo $row['id'];?>" target="_blank"><i class="fa fa-file"></i></a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>  
</table>


