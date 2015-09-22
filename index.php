<script>
$(document).ready(function(){
        $("#panel").slideDown("slow");

        $("#panel").click(function(){
          $("#panel").hide();
          $("#panel2").slideDown("slow");
        });
});
</script>
<style>
#panel, #panel2, #flip {
    padding: 0px;
    background-color: #1C1C1C;
    color: #ffffff;
    font-size: 50px;
    text-align: center;
}

#panel, #panel2 {
    padding: 20px;
    display: none;
    width: 100%;
}
#panel-inside {
  width: 75%;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<?php
#If any of the below channels are online then it displays the channel Iframe on the page.
$channels = array('Insidific','dexbonus','dansgaming') ;

$callAPI = implode(",",$channels);
$online = 'online.png';
$offline = 'offline.png';
$dataArray = json_decode(@file_get_contents('https://api.twitch.tv/kraken/streams?channel=' . $callAPI), true);

foreach($dataArray['streams'] as $mydata){
  if($mydata['_id'] != null){
      $name      = $mydata['channel']['display_name'];
      $game      = $mydata['channel']['game'];
      $url       = $mydata['channel']['url'];
  ?>
    <div id="panel"><div id="panel-inside"><i class="fa fa-twitch"></i> Insidific if live click here to watch</div></div>
    <div id="panel2"><iframe src="http://www.twitch.tv/<?php echo $name ?>/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe><a href="http://www.twitch.tv/<?php echo $name ?>?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;"></a>
  <?php
  }
}
?>
