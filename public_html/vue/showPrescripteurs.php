<?php 	
        echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=addnew\">Ajout nouveau prescripteur</a><br/><br/>");
	
	foreach($contacts as $info){
                echo('<div data-role="collapsible">');
                echo('<h2>'.$info->getNom().'</h2>');
                    echo('<ul data-role="listview" data-autodividers="true" data-theme="e" data-divider-theme="x">');
                        echo("<li>");
                        echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=details&id=".$info->getId()."\">");
                        echo('Contact :&nbsp;"'.$info->getTel().'"<br/>');
                        echo('Description :&nbsp;"'.$info->getDescription().'"<br/>');
                        echo('Mail :&nbsp;"'.$info->getMail().'"<br/>');
                        
                        echo("<input   type="button" onclick="location.href='tel:<?php echo $info->getTel();  ?>'" value="Call to <?php echo $info->getNom(); ?>" />");               
                       echo("<input   type="button" onclick="location.href='sms:<?php echo $info->getTel();  ?>'" value="Send message to <?php echo $info->getNom(); ?>" />");
                       
                    echo('</a></li>');
                   echo('</ul>');
                echo('</div>');
	}
	 
?>