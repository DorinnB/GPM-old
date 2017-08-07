<div class="row splitBot" style="height:20%">
	<div class="col-md-4" style="height:100%">
		<div class="row" style="height:100%">
			<div class="col-md-4" style="height:100%">
				<label for="Dy T">Date :</label>
				<input type="text" class="form-control" name="dateInOut" id="dateInOut" value="<?= date("Y-m-d")	?>">
				<input type="hidden" name="id_info_job" id="id_info_job" value="<?=	$split['id_info_job']	?>">

			</div>
			<div class="col-md-8" style="height:100%">
				<p class="">Commentaires :</p>
				<textarea class="commentaireEditable" id="inOut_commentaire" name="inOut_commentaire"></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="height:100%;overflow-y:scroll;overflow-x:hidden;" >
		<p class="">History :</p>

		<table class="table table-striped table-condensed table-bordered">
			<tr>
				<th>Date</th>
				<th>Commentaire</th>
			</tr>
			<?php foreach ($lstInOut as $key => $value) :	?>
				<tr class="dateHighlight" data-date="<?=	$value['inOut_date']	?>">
					<td><?=	$value['inOut_date']	?></td>
					<td><?=	$value['inOut_commentaire']	?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div class="col-md-3" style="height:100%">
		<p class="" id="flipRecommendation">Recommendation :</p>
		<div id="inOut_recommendation_alt"><?=	$split['inOut_recommendation']	?></div>
		<textarea class="commentaireEditable flip" id="inOut_recommendation" name="inOut_recommendation" value="<?=	$split['inOut_recommendation']	?>"></textarea>
	</div>

	<div class="col-md-1" id="split-bouton" style="height:100%">
		<div class="row" style="height:100%">
			<div class="col-md-12" id="save" style="height:33%">
				<img type="image" src="img/save.png" style="max-width:100%; max-height:100%; padding:5px 0px;display: block; margin: auto;" />
			</div>

			<div class="col-md-12 check<?=	$split['checked']	?>" id="check" style="height:33%">
				<img type="image" src="img/<?=	($split['checked']==0)?'cross.png':'check.png'	?>" style="max-width:100%; max-height:100%;padding:5px 0px;display: block; margin: auto;" />
			</div>


			<div class="col-md-12" id="export" style="height:33%">
				<a href="controller/createReport-controller.php?id_tbljob=<?=	$split['id_tbljob']	?>">

					<img type="image" src="img/export.png" style="max-width:100%; max-height:100%; padding:5px 0px;display: block; margin: auto;" />
				</a>
			</div>
		</div>



	</div>
</div>