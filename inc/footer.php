<div class="page-chatapi hideit">

    <div class="chat-wrapper">
     
    </div>

</div>
<script>
     $("#ckbCheckAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
</script>
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var j = 0; j < chks.length; j++)
{
if (chks[j].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}

$(document).ready(function(){
$('#ckbCheckAll').click(function(event) { 

            if($(this).is(":checked")) {

                $('.checkBoxClass').each(function(){

                    $(this).prop("checked",true);

                });

            }

            else{

                $('.checkBoxClass').each(function(){

                    $(this).prop("checked",false);

                });

            }   
    }); 

    });
</script>

<!-- CORE JS FRAMEWORK - START --> 
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
<script src="assets/js/popper.min.js" type="text/javascript"></script> 
<script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
<script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.2.min.js"><\/script>');</script>
<!-- CORE JS FRAMEWORK - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="assets/plugins/rickshaw-chart/vendor/d3.v3.html" type="text/javascript"></script> <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/rickshaw-chart/js/Rickshaw.All.html"></script>
<script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
<script src="assets/plugins/easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/plugins/morris-chart/js/raphael-min.js" type="text/javascript"></script>
<script src="assets/plugins/morris-chart/js/morris.min.js" type="text/javascript"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="assets/plugins/gauge/gauge.min.js" type="text/javascript"></script>
<script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="assets/js/crm-dashboard.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- CORE TEMPLATE JS - START --> 
<script src="assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example-11').DataTable();
} );
</script>

<!--<script type="text/javascript">-->
<!--        function disableBack() { window.history.forward(); }-->
<!--        setTimeout("disableBack()", 0);-->
<!--        window.onunload = function () { null };-->
<!--</script>-->

</body>
</html>




