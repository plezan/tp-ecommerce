<?php 
$tabs = array("Account", "Article", "Stock","Categorie");
 ?>
<div class="systeme_onglets">
    <div class="onglets">
	    <?php foreach ($tabs as $tab) { ?>
	    
            <span 	class="tab" 
            		id= <?php echo '"tab_'.$tab.'"'; ?>
             		onclick='javascript:change_tab( <?php echo '"'.$tab.'"'; ?> )'>
             		<?php echo $tab; ?>
             			
             </span>

        <?php } ?> 
    </div>
    <div>
    	<?php foreach ($tabs as $tab) { ?>
    	
            <div class="content_tab" id=<?php echo'"content_tab_'.$tab.'"'?>>
            	<?php require_once ("tab".$tab.".php") ?>
            </div>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    var old_Tab = 
    <?php
        $tabOnLoad = 0;
        if( !empty($_GET['tab'])) {
            $tabOnLoad = $_GET['tab'];
        }
        echo '"'.$tabs[$tabOnLoad].'"'; 
    ?>;
    change_tab(old_Tab);
</script>