<select class="form-control" name="emp" required>
			<option value="">--Select Employee--</option>
			<?php
			$queryuss ="SELECT *FROM tblusers where user_type='Business Consultant'";
			$resultss = $db->query($queryuss);
			while($rows=mysqli_fetch_array($resultss))
			{
			?>
			<option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$_POST['emp']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?> ( <?php echo $rows['user_type']; ?> )</option>
			<?php
			}
			?>
			</select>