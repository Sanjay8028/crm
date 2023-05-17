<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']=='')
    {

    }
    else
    {
        
          $qu="select *from tblleads where mobile='".$_POST['mobile']."' OR email='".$_POST['email']."'";
            $rq = $db->query($qu);
        $count=mysqli_num_rows($rq);
        $rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        if($count==1)
    {
        
        
        
        $qu="Update tblleads set company_name='".addslashes($_POST['company_name'])."',email='".addslashes($_POST['email'])."',
        client_name='".addslashes($_POST['client_name'])."',mobile='".$_POST['mobile']."',address='".$_POST['address']."',
        product='".$_POST['product']."',lead_source='".$_POST['lead_source']."',city='".$_POST['city']."',caddress='".$_POST['caddress']."',
        pitch_amount='".$_POST['pitch_amount']."',call_duration='".$_POST['call_duration']."',catlog_url='".$_POST['catlog_url']."',proposal='".$_POST['proposal']."',
        status='".$_POST['activity']."',comment='".$_POST['comment']."',update_data='".date('d-m-Y')."' where id='".$_GET['id']."'";
        $rs=$db->query($qu);
        $error="Update Successfully !";
    }
    
     else
        {
            $error="Parties already exits !";
        }
    }
}

    $qus="select *from tblleads where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
?>
<!-- START CONTENT -->

<section id="main-content" class=" ">
  <section class="wrapper main-wrapper" style=''>
    <div class="col-12">
      <section class="box ">
      <header class="panel_header">
        <h2 class="title float-left">Update Lead</h2>
        <div class="actions panel_actions float-right"> 
            <a class="box_toggle fa fa-chevron-down"></a> 
            <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> 
            <a class="box_close fa fa-times"></a> 
        </div>
      </header>
      <div class="content-body">
      <form action="" method="POST">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>
        <label class="form-label"><b>Basic Information</b></label>
        <hr/>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Company Name</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="company_name" value="<?php echo $rowq['company_name']; ?>" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Email</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="email" name="email" value="<?php echo $rowq['email']; ?>" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Client Name</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="client_name" value="<?php echo $rowq['client_name']; ?>" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Mobile</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="mobile" value="<?php echo $rowq['mobile']; ?>" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Products</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="product" value="<?php echo $rowq['product']; ?>" class="form-control" required="">
              </div>
            </div>
          </div>
        </div>
        <br/>
        <label class="form-label"><b>Other Information</b></label>
        <hr/>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Lead Source</label>
              <span class="desc"></span>
              <div class="controls">
                <select class="form-control" name="lead_source" required="">
                  <option value="">--Select--</option>
                  <option value="Admin" <?php if($rowq['lead_source']=='Admin') { echo 'selected=selected';} ?>>Admin</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">City</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="city" value="<?php echo $rowq['city']; ?>" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Address</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="address" class="form-control" value="<?php echo $rowq['address']; ?>" >
              </div>
            </div>
          </div>
          <!--<div class="col-lg-4 col-md-4 col-12">
        <div class="form-group">
            <label class="form-label">Commercial Address</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="caddress" class="form-control" value="<?php //echo $rowq['caddress']; ?>">
            </div>
        </div>
    </div>-->
        </div>
        <br/>
        <label class="form-label"><b>Follow Up / Activity Information</b></label>
        <hr/>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Pitch Amount</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="pitch_amount" value="<?php echo $rowq['pitch_amount']; ?>" class="form-control" >
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Call Duration</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="call_duration" value="<?php echo $rowq['call_duration']; ?>" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Catalog URL</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="catlog_url" class="form-control" value="<?php echo $rowq['catlog_url']; ?>" >
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Proposal</label>
              <span class="desc"></span>
              <div class="controls">
                <select class="form-control" name="proposal" required="">
                  <option value="">--Select--</option>
                  <option value="Rising Proposal" <?php if($rowq['proposal']=='Rising Proposal') { echo 'selected=selected';} ?>>Rising Proposal</option>
                  <option value="Golden Proposal" <?php if($rowq['proposal']=='Golden Proposal') { echo 'selected=selected';} ?>>Golden Proposal</option>
                  <option value="Platinum Proposal" <?php if($rowq['proposal']=='Platinum Proposal') { echo 'selected=selected';} ?>>Platinum Proposal</option>
                  <option value="Global Proposal" <?php if($rowq['proposal']=='Global Proposal') { echo 'selected=selected';} ?>>Global Proposal</option>
                  <option value="SEO Proposal" <?php if($rowq['proposal']=='SEO Proposal') { echo 'selected=selected';} ?>>SEO Proposal</option>
                  <option value="Not Send" <?php if($rowq['proposal']=='Not Send') { echo 'selected=selected';} ?>>Not Send</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Activity</label>
              <span class="desc"></span>
              <div class="controls">
                <select class="form-control" name="activity" required="">
                  <option value="">--Select--</option>
                  <?php
            $qus="select *from tblactivity";
            $rsq = $db->query($qus);
            while($rwt=mysqli_fetch_array($rsq))
            {
            ?>
                  <option value="<?php echo $rwt['activity']; ?>" <?php if($rwt['activity']==$rowq['status']) { echo 'selected=selected';} ?>><?php echo $rwt['activity']; ?></option>
                  <?php
            }
            ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="form-group">
              <label class="form-label">Comment</label>
              <span class="desc"></span>
              <div class="controls">
                <input type="text" name="comment" class="form-control" value="<?php echo $rowq['comment']; ?>" >
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12"> </div>
          <div class="col-lg-4 col-md-4 col-12">
            <div class="text-left">
              <?php if($_GET['id']!=''){ ?>
              <button type="submit" class="btn btn-primary" name="submit">Save</button>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12"> </div>
        </div>
        <br/>
        <br/>
      </form>
    </div>
    </section>
    </div>
  </section>
</section>
<?php include('inc/footer.php'); ?>
