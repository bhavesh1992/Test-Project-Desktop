<!--
@VERSION  TEST
-->
<?php
include("test.php");
include("core/config.php");
include("core/functions.php");
include("core/lang-" . $GLOBALS['lang'] . ".php");
page_protect();
$loggedin = $_SESSION['user_id'];
$getudata = @mysql_fetch_assoc(@mysql_query('SELECT * from nc_users WHERE `id` ="' . $loggedin . '%"'));
    $getautopay = $getudata['uautopay'];
    $getproaccu = $getudata['uproaccu'];
    $getpaymode = $getudata['upaymode'];
    $getproaccur = $getudata['uproaccur'];
    $getbonusreceived = $getudata['uafbore'];
	$getlogyouac = $getudata['ulogac'];
	$getpassnoty = $getudata['upassno'];
	$getwalletadd = $getudata['walletaddress'];
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="SemiColonWeb" />

        <!-- Stylesheets
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base; ?>fassets/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base; ?>fassets/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base; ?>fassets/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base; ?>fassets/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base; ?>fassets/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base; ?>fassets/css/magnific-popup.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo $base; ?>fassets/css/responsive.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

        <!-- External JavaScripts
        ============================================= -->
        <script type="text/javascript" src="<?php echo $base; ?>fassets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $base; ?>fassets/js/plugins.js"></script>
		<style>		
			input[type=checkbox] {
				zoom: 1.5;
			}	
		</style>
		<script type="text/javascript">
		
		function disableall($variable){
			if($variable == "uautopay"){
				$("#profitaccu").attr("disabled", true);
			}
			else
			{
				$("#autometicpay").attr("disabled", true);	
			}
		}
		
		function enableall($variable){
			if($variable == "uautopay"){
				$("#profitaccu").removeAttr("disabled");
			}
			else
			{
				$("#autometicpay").removeAttr("disabled");
			}
		}
		 
		
		$(document).ready(function () {
                                // User Full Name Process Starts
								$("#autometicpay").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
									$("#saveload").show();
									var field = "uautopay";
									disableall(field);
                                    e.preventDefault();
									var checkbox = $('#autometicpay');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Auto Payment";
                                    var variable = "uautopay";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
											$("#saveload").hide();
											enableall(field);
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#profitaccu").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
									$("#saveload").show();
									var field = "uproaccu";
									disableall(field);
                                    e.preventDefault();
									var checkbox = $('#profitaccu');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Profit Accumulation";
                                    var variable = "uproaccu";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
											$("#saveload").hide();
											enableall(field);
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#paymentmode").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
                                    e.preventDefault();
									var checkbox = $('#paymentmode');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Payment Made";
                                    var variable = "upaymode";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#proaccur").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
                                    e.preventDefault();
									var checkbox = $('#proaccur');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Profit Accured";
                                    var variable = "uproaccur";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#bonusreceived").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
                                    e.preventDefault();
									var checkbox = $('#bonusreceived');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Affiliate Bonus Settings";
                                    var variable = "uafbore";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#logyouraccount").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
                                    e.preventDefault();
									var checkbox = $('#logyouraccount');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Login Your Account";
                                    var variable = "ulogac";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#passnotify").on("change",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
                                    e.preventDefault();
									var checkbox = $('#passnotify');
									if(checkbox.is(':checked')){
										var favorite = 1;
									} else {
										var favorite = 0;
									}
									var dismsg = "Password Notify";
                                    var variable = "upassno";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
                                            $('#msg').html(data[0]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
                                        }
                                    });
                                });
								
								$("#editbitcoin").on("click",function(e){
									$(".bitcoshow").hide();
									$("#editbitcoin").hide();
									$("#bitcoinnew").show();
									$("#savebitcoin").show();
								});
								
								$("#savebitcoin").on("click",function(e){
                                //var id= $(this).attr('id');
                                    $('#updated').hide();
                                    e.preventDefault();
									var favorite = $('#bitcoinnew').val();
									var dismsg = "Wallet Address Settings";
                                    var variable = "walletaddress";
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/updatesettings.php",
                                        data: "favorite="+favorite + "&variable=" + variable + "&dismsg=" + dismsg,
                                        cache: false,
                                        dataType: "json",
                                        success: function (data) {
                                            //$('.updated').show();
                                            $('#msg').html(data[0]);
											$('.bitcoshow').html(data[1]);
                                            $("#updated").slideDown("fast");
                                            $("#updated").fadeOut(1500);
											$(".bitcoshow").show();
											$("#editbitcoin").show();
											$("#bitcoinnew").hide();
											$("#savebitcoin").hide();
                                        }
                                    });
                                });
								
		});
		</script>
            <!-- Header
            ============================================= -->
           <?php include("include/header.php"); ?>
            <!-- #header end -->
Changed by Mayur

            <!-- Content
            ============================================= -->
            <section id="content" style="margin-bottom: 0px;">

                <div class="content-wrap">

                    <div class="container clearfix">

                        <div class="clear"></div>
						
						<div id="side-navigation" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

                            <div class="col_one_fourth nobottommargin">

                                <?php include "include/sidebar.php"; ?>
                                  
                            </div>
							<div id="saveload" class="uk-notify uk-notify-top-right" style="display: none;"><div class="uk-notify-message" style="opacity: 1; margin-top: 0px; margin-bottom: 10px;"><a class="uk-close"></a>Saving Data...</div></div>
							<div id="updated" class="uk-notify uk-notify-top-right" style="display: none;"><div class="uk-notify-message" style="opacity: 1; margin-top: 0px; margin-bottom: 10px;"><a class="uk-close"></a><div id="msg"></div></div></div>
                            <div class="col_three_fourth col_last nobottommargin">

							<div id="snav-content1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
                                                           
                                                            
                                                            
                                                  <div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Settings</h3>
							</div>
							<div class="panel-body">
								<div class="col_full panel panel-default">
							
							<div class="panel-body">
                                                            <div class="panel panel-default">
							<div class="panel-body">
                                                            <form class="form-inline" style="margin:0;">
							<div class="form-group">
                                                            My Bitcoin Wallet Address: <strong><span class="bitcoshow"><?php echo $getwalletadd;?></span></strong>
                                                            <a id="editbitcoin" style="margin-left: 5px; text-decoration: underline !important;" href="#" onclick="return false;">Change</a>
															<input class="form-control" type="text" value="<?php echo $getwalletadd;?>" id="bitcoinnew"/ style="display:none;">
															<a id="savebitcoin" style="display:none;" class="btn btn-success btn-sm" onclick="return false;">Save</a>
							</div>
							</form>
							</div>
                                                            </div>
                                                            
                                                            <form method="post">
                                                               <label>
															   <?php $checked = ($getautopay == 1) ? 'checked="checked"' : ''; ?>
															   <?php if($getwalletadd != ""){ ?>
																   <input type="radio" name="auto" id="autometicpay" value="<?php echo $getautopay;?>" <?php echo $checked; ?>><strong> Automatic Payment</strong>
															<?php }else{ ?>
                                                                   <input type="radio" name="auto" id="autometicpay" value="<?php echo $getautopay;?>" <?php echo $checked; ?> disabled><strong> Automatic Payment</strong>
															<?php } ?>
                                                               </label><br>
                                                               <p>-Founds are automatic withdrawn from balance as soon as you get 0.005 BTC</p>
                                                               <label>
															   <?php $checked1 = ($getproaccu == 1) ? 'checked="checked"' : ''; ?>
                                                                   <input type="radio" name="auto" id="profitaccu" value="<?php echo $getproaccu;?>" <?php echo $checked1; ?>><strong> Profit Accumulation</strong>
                                                               </label><br>
                                                               <p>-Founds are accrued on the balance you can use them for power purchasing</p>
                                                               <h4>Email Notification</h4>
                                                               <label>
															   <?php $checked2 = ($getpaymode == 1) ? 'checked="checked"' : ''; ?>
                                                                   <input type="checkbox" id="paymentmode" value="<?php echo $getpaymode;?>" <?php echo $checked2; ?>> Payment is made
                                                               </label><br>
                                                               <label>
															   <?php $checked3 = ($getproaccur == 1) ? 'checked="checked"' : ''; ?>
                                                                   <input type="checkbox" id="proaccur" value="<?php echo $getproaccur;?>" <?php echo $checked3; ?>> Profit is accured
                                                               </label><br>
                                                               <label>
															   <?php $checked4 = ($getbonusreceived == 1) ? 'checked="checked"' : ''; ?>
                                                                   <input type="checkbox" id="bonusreceived" value="<?php echo $getbonusreceived;?>" <?php echo $checked4; ?>> Affiliate Bonus is received
                                                               </label><br>
                                                               <label>
															   <?php $checked5 = ($getlogyouac == 1) ? 'checked="checked"' : ''; ?>
                                                                   <input type="checkbox" id="logyouraccount" value="<?php echo $getlogyouac;?>" <?php echo $checked5; ?>><stronge style="color:red;"> You login your account</stronge>
                                                               </label><br>
                                                               <label>
															   <?php $checked6 = ($getpassnoty == 1) ? 'checked="checked"' : ''; ?>
                                                                   <input type="checkbox" id="passnotify" value="<?php echo $getpassnoty;?>" <?php echo $checked6; ?>> <stronge style="color:red;">Notify on password change</stronge>
                                                               </label><br>
                                                            </form>
							
							</div>
						</div>
                                                            
							</div>
						</div>          
                                                        </div>
                                        </div>

                        </div>
						
                        <div class="clear"></div>    
                    </div>
                </div>

            </section><!-- #content end -->

            <!-- Footer
            ============================================= -->
            
            <?php include "include/footer.php";?>
            
            <!-- #footer end -->

        
</div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- Footer Scripts
        ============================================= -->
        <script type="text/javascript" src="<?php echo $base; ?>fassets/js/functions.js"></script>

    </body>
</html>