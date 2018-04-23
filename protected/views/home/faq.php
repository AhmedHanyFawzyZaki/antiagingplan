<?php  // set the page title


$this->pageTitle=Yii::app()->name . ' - FAQ';
?>

<div class="content">
<div class="emak-academy">


    <h2>FAQS</h2>
    <div id="toggle">
	<ul>

	<?php
	foreach ($faqs as $faq ){

		echo "<li>$faq[question] </li>
				<div>

				$faq[answer]
				</div>	";

	}

	?>
	</ul>
</div>





</div>
</div>