<?php $activePage = 'index'; ?>
<?php include("header.php"); ?>
<?php $visible = getVisibility(); ?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your-app-id',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="ion-ios-speedometer"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
<div class="jumbotron">
   <h1>Latest News</h1>
   <?php $myarray = getNews(); ?>
   <h4><i><?php echo $myarray[0]['newsValidity']; ?></i></h4>
   <p><?php echo $myarray[0]['newsContent']; ?></p>
</div>

            
            <div class="row">
         <div class="col-lg-6 col-md-12">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="fa fa-facebook-square fa-5x"></i>
                     </div>
                  </div>
               </div>
               
               <div class="fb-page" data-href="https://www.facebook.com/<?php echo $visible['facebook']; ?>" data-tabs="timeline" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/<?php echo $visible['facebook']; ?>"><a href="https://www.facebook.com/<?php echo $visible['facebook']; ?>"><?php echo $visible['facebookName']; ?></a></blockquote></div></div>
               
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="panel" style="background-color: #55acee">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="ion ion-social-twitter-outline" style="font-size: 5em"></i>
                     </div>
                     
                  </div>
               </div>
               <a class="twitter-timeline" href="https://twitter.com/<?php echo $visible['twitter']; ?>" data-widget-id="713136015125381122" data-screen-name="<?php echo $visible['twitter']; ?>">Tweets by @<?php echo $visible['twitter']; ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
               
            </div>
         </div>
      </div>  
                    
                
                
<?php include("footer.php"); ?>