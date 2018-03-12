<link href="css/splitEprouvette.css" rel="stylesheet">
<div class="col-md-12" style="height:100%">
  <table id="table_ep" data-idJob="<?php echo $split['id_tbljob'];	?>" class="table table-striped table-condensed table-hover table-bordered" cellspacing="0" width="100%"  style="height:100%; white-space:nowrap;">
    <thead>
      <tr>
        <th>id</th>
        <th><acronym title="Availability">A</acronym></th>
        <th><acronym title="Specimen Prefix">Prefix</acronym></th>
        <th><acronym title="Specimen Name">ID</acronym></th>
        <th><acronym title="Temperature">T°</acronym></th>
        <th><acronym title="Frequency">F.</acronym></th>
        <th><acronym title="Switch To Load">STL</acronym></th>
        <th><acronym title="Load Frequency">F.<SUB>STL</SUB></acronym></th>
        <th id="ChartTitreCons" data-titre="<?= $split['ChartTitreCons']  ?>"><?= $split['cons1'] ?></th>
        <th><?= $split['cons2'] ?></th>
        <th><acronym title="Lab Max">M <?= ($split['c_unite']=="MPa")?"kN":$split['c_unite']  ?></acronym></th>
        <th><acronym title="Lab Min">m <?= ($split['c_unite']=="MPa")?"kN":$split['c_unite']  ?></acronym></th>
        <th><acronym title="Minimum Requirement">Cy Min</acronym></th>
        <th>Runout</th>
        <th><acronym title="Estimated Cycle">Est.<SUB>Cy</SUB></acronym></th>
        <th><acronym title="Order Comment">Com.</acronym></th>
        <th><acronym title="Order Check">Chk</acronym></th>
        <th><acronym title="Lab Observation">L. Obs.</acronym></th>
        <th><acronym title="Quality Review">Q.</acronym></th>
        <th><acronym title="Quality Observation">Q. Obs</acronym></th>
        <th><acronym title="Current Block">State</acronym></th>
        <th><acronym title="Test Number">Test</acronym></th>
        <th><acronym title="Files Number">Files</acronym></th>
        <?php  foreach ($dimDenomination as $dimTexte): ?>
          <th><?= $dimTexte  ?></th>
        <?php  endforeach  ?>
        <th>Frame</th>
        <th>Date</th>
        <th><acronym title="Waveform">Wave.</acronym></th>
        <th><acronym title="STL Cycles">STL</acronym></th>
        <th><acronym title="Final Cycles">Final</acronym></th>
        <th><acronym title="Test Duration (h)">Tps</acronym></th>
        <th><acronym title="Dilatation">&Delta;&epsilon; °</acronym></th>
        <th><acronym title="First Cycle Load Max">L M</acronym></th>
        <th><acronym title="First Cycle Load Min">L. m</acronym></th>
        <th><acronym title="First Cycle Strain Max">&epsilon; M</acronym></th>
        <th><acronym title="First Cycle Strain Min">&epsilon; m</acronym></th>
        <th><acronym title="Residual Load">Res.L</acronym></th>
        <th><acronym title="Straightning (mm)">Straight.</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle">2<sup>nd</sup> Cy</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Load Max">L. M</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Load Min">L. m</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Strain Max">&Delta;&epsilon;</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Strain Min">&Delta;&epsilon;<SUB>e</SUB></acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation Residual Load">Res.L</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation Straightning (mm)">Straight.</acronym></th>
        <th><acronym title="APS Done">APS</acronym></th>
        <th><acronym title="Rupture Check">R.</acronym></th>
        <th><acronym title="Data Check">D.</acronym></th>
      </tr>
    </thead>

    <tfoot>
      <tr>
        <th>id</th>
        <th><acronym title="Availability">A</acronym></th>
        <th><acronym title="Specimen Prefix">Prefix</acronym></th>
        <th><acronym title="Specimen Name">ID</acronym></th>
        <th><acronym title="Temperature">T°</acronym></th>
        <th><acronym title="Frequency">F.</acronym></th>
        <th><acronym title="Switch To Load">STL</acronym></th>
        <th><acronym title="Load Frequency">F.<SUB>STL</SUB></acronym></th>
        <th id="ChartTitreCons" data-titre="<?= $split['ChartTitreCons']  ?>"><?= $split['cons1'] ?></th>
        <th><?= $split['cons2'] ?></th>
        <th><acronym title="Lab Max">M <?= ($split['c_unite']=="MPa")?"kN":$split['c_unite']  ?></acronym></th>
        <th><acronym title="Lab Min">m <?= ($split['c_unite']=="MPa")?"kN":$split['c_unite']  ?></acronym></th>
        <th><acronym title="Minimum Requirement">Cy Min</acronym></th>
        <th>Runout</th>
        <th><acronym title="Estimated Cycle">Est.<SUB>Cy</SUB></acronym></th>
        <th><acronym title="Order Comment">Com.</acronym></th>
        <th><acronym title="Order Check">Chk</acronym></th>
        <th><acronym title="Lab Observation">L. Obs.</acronym></th>
        <th><acronym title="Quality Review">Q.</acronym></th>
        <th><acronym title="Quality Observation">Q. Obs</acronym></th>
        <th><acronym title="Current Block">State</acronym></th>
        <th><acronym title="Test Number">Test</acronym></th>
        <th><acronym title="Files Number">Files</acronym></th>
        <?php  foreach ($dimDenomination as $dimTexte): ?>
          <th><?= $dimTexte  ?></th>
        <?php  endforeach  ?>
        <th>Frame</th>
        <th>Date</th>
        <th><acronym title="Waveform">Wave.</acronym></th>
        <th><acronym title="STL Cycles">STL</acronym></th>
        <th><acronym title="Final Cycles">Final</acronym></th>
        <th><acronym title="Test Duration (h)">Tps</acronym></th>
        <th><acronym title="Dilatation">&Delta;&epsilon; °</acronym></th>
        <th><acronym title="First Cycle Load Max">L M</acronym></th>
        <th><acronym title="First Cycle Load Min">L. m</acronym></th>
        <th><acronym title="First Cycle Strain Max">&epsilon; M</acronym></th>
        <th><acronym title="First Cycle Strain Min">&epsilon; m</acronym></th>
        <th><acronym title="Residual Load">Res.L</acronym></th>
        <th><acronym title="Straightning (mm)">Straight.</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle">2<sup>nd</sup> Cy</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Load Max">L. M</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Load Min">L. m</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Strain Max">&Delta;&epsilon;</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation First Cycle Strain Min">&Delta;&epsilon;<SUB>e</SUB></acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation Residual Load">Res.L</acronym></th>
        <th class="rotation"><acronym title="2<sup>nd</sup> Rotation Straightning (mm)">Straight.</acronym></th>
        <th><acronym title="APS Done">APS</acronym></th>
        <th><acronym title="Rupture Check">R.</acronym></th>
        <th><acronym title="Data Check">D.</acronym></th>
      </tr>
    </tfoot>

    <tbody>
      <?php for($k=0;$k < count($ep);$k++): ?>
        <tr class="chartTR">
          <td ><?= $ep[$k]['id_master_eprouvette'] ?></td>
          <td class="dispo open-GestionEp selectable"  data-toggle="modal" data-target="#gestionEp" data-id="<?= $ep[$k]['id_eprouvette'] ?>" data-dispo="<?= $ep[$k]['dispo'] ?>"><?= $ep[$k]['dispo'] ?></td>
          <td><?= $ep[$k]['prefixe'] ?></td>
          <td><?= $ep[$k]['nom_eprouvette'] ?><sup><?= ($ep[$k]['retest']!=1)?$ep[$k]['retest']:'' ?></sup></td>
          <td class="decimal1" <?= $epHisto2[$k]['c_temperature'] ?>><?= $ep[$k]['c_temp'] ?></td>
          <td class="decimal1" <?= $epHisto2[$k]['c_frequence'] ?>><?= $ep[$k]['c_frequence'] ?></td>
          <td class="decimal0" <?= $epHisto2[$k]['c_cycle_STL'] ?>><?= $ep[$k]['c_cycle_STL'] ?></td>
          <td class="decimal1"<?= $epHisto2[$k]['c_frequence_STL'] ?>><?= $ep[$k]['c_frequence_STL'] ?></td>
          <td class="decimal<?=  $ep[$k]['c_type_1_deci']  ?> <?=  $split['ChartCons1']  ?>" <?= $epHisto2[$k]['c_type_1_val'] ?>><?= $ep[$k]['c_type_1_val'] ?></td>
          <td class="decimal<?=  $ep[$k]['c_type_2_deci']  ?> <?=  $split['ChartCons2']  ?>" <?= $epHisto2[$k]['c_type_2_val'] ?>><?= $ep[$k]['c_type_2_val'] ?></td>
          <td class="decimal<?=  $ep[$k]['c_type_1_deci']  ?> chartMax"><?= $ep[$k]['max'] ?></td>
          <td class="decimal<?=  $ep[$k]['c_type_2_deci']  ?>"><?= $ep[$k]['min'] ?></td>
          <td class="decimal0" <?= $epHisto2[$k]['Cycle_min'] ?>><?= $ep[$k]['Cycle_min'] ?></td>
          <td class="decimal0" <?= $epHisto2[$k]['runout'] ?>><?= $ep[$k]['runout'] ?></td>
          <td class="decimal0 <?= $ep[$k]['cycle_estimeCSS'] ?>"><?= $ep[$k]['cycle_estime'] ?></td>
          <td class="popover-markup" data-placement="left"><?= ($ep[$k]['comm'].$ep[$k]['c_commentaire']=="")?"":substr($ep[$k]['comm'].$ep[$k]['c_commentaire'],0,5)." [...]" ?>
            <?php if ($ep[$k]['comm'].$ep[$k]['c_commentaire'] !=""):  ?>
              <div class="head hide">Order Comment</div>
              <div class="content hide">
                <div class="form-group">
                  <textarea class"bubble_commentaire" name="c_commentaire" rows="10" cols="50" style="resize:none;" disabled><?= $ep[$k]['comm'].$ep[$k]['c_commentaire'] ?></textarea>
                </div>
              </div>
            <?php endif ?>
          </td>
          <td class="checkEp selectable" data-checked="<?= max(0,$ep[$k]['c_checked']) ?>" data-idepchecked="<?= $ep[$k]['id_eprouvette'] ?>"><?= $ep[$k]['c_checked'] ?></td>
          <td class="popover-markup" data-placement="left"><?= ($ep[$k]['d_commentaire']=="")?"":substr($ep[$k]['d_commentaire'],0,5)." [...]" ?>
            <?php if ($ep[$k]['d_commentaire'] !=""):  ?>
              <div class="head hide">Lab Observation</div>
              <div class="content hide">
                <div class="form-group">
                  <textarea class"bubble_commentaire" name="d_commentaire" rows="10" cols="50" style="resize:none;" disabled><?= $ep[$k]['d_commentaire'] ?></textarea>
                </div>
              </div>
            <?php endif ?>
          </td>
          <td class="flag_qualite selectable" data-flagQualite="<?= $ep[$k]['flag_qualite'] ?>"  data-idepflagqualite="<?= $ep[$k]['id_eprouvette'] ?>"><?= $ep[$k]['flag_qualite'] ?></td>
          <td class="popover-markup" data-placement="left"><?= ($ep[$k]['q_commentaire']=="")?"":substr($ep[$k]['q_commentaire'],0,5)." [...]" ?>
            <?php if ($ep[$k]['q_commentaire'] !=""):  ?>
              <div class="head hide">Quality Observation</div>
              <div class="content hide">
                <div class="form-group">
                  <textarea class"bubble_commentaire" name="q_commentaire" rows="10" cols="50" style="resize:none;" disabled><?= $ep[$k]['q_commentaire'] ?></textarea>
                </div>
              </div>
            <?php endif ?>
          </td>
          <td><?= $ep[$k]['currentBlock'] ?></td>
          <td <?= $epHisto2[$k]['n_essai'] ?>><?= $ep[$k]['n_essai'] ?></td>
          <td class="chartFile" <?= $epHisto2[$k]['n_fichier'] ?>><?= $ep[$k]['n_fichier'] ?></td>
          <?php for($i=1;$i <= count($dimDenomination);$i++): ?>
            <td class="decimal3"><?= $ep[$k]['dim'.$i]  ?></td>
          <?php  endfor  ?>
          <td <?= $epHisto2[$k]['machine'] ?>><?= $ep[$k]['machine'] ?></td>
          <td <?= $epHisto2[$k]['date'] ?>><?= $ep[$k]['date'] ?></td>
          <td <?= $epHisto2[$k]['waveform'] ?>><?= $ep[$k]['waveform'] ?></td>
          <td class="decimal0" <?= $epHisto2[$k]['Cycle_STL'] ?>><?= $ep[$k]['Cycle_STL'] ?></td>
          <td class="chartCycle decimal0 <?= $ep[$k]['Cycle_min_nonAtteint']  ?> Cycle_final_valid<?= $ep[$k]['Cycle_final_valid'] ?>" <?= $epHisto2[$k]['Cycle_final'] ?>><?= $ep[$k]['Cycle_final'] ?></td>
          <td class="decimal0 <?= $ep[$k]['cycle_estimeCSS'] ?>"><?= (isset($ep[$k]['temps_essais'])?$ep[$k]['temps_essais']:$ep[$k]['temps_essais_calcule']) ?></td>
          <td class="decimal3" <?= $epHisto2[$k]['dilatation'] ?>><?= $ep[$k]['dilatation'] ?></td>
          <td class="checkValue_c1_max_stress decimal1" <?= $epHisto2[$k]['c1_max_stress'] ?>><?= (isset($ep[$k]['c1_max_stress'])?$ep[$k]['c1_max_stress']*$area/1000:'') ?></td>
          <td class="checkValue_c1_min_stress decimal1" <?= $epHisto2[$k]['c1_min_stress'] ?>><?= (isset($ep[$k]['c1_min_stress'])?$ep[$k]['c1_min_stress']*$area/1000:'') ?></td>
          <td class="decimal2" <?= $epHisto2[$k]['c1_max_strain'] ?>><?= $ep[$k]['c1_max_strain'] ?></td>
          <td class="decimal2" <?= $epHisto2[$k]['c1_min_strain'] ?>><?= $ep[$k]['c1_min_strain'] ?></td>
          <td class="decimal2" <?= $epHisto2[$k]['val_1'] ?>><?= $ep[$k]['val_1'] ?></td>
          <td class="decimal2" <?= $epHisto2[$k]['val_3'] ?>><?= $ep[$k]['val_3'] ?></td>
          <td class="decimal2" <?= $epHisto2[$k]['c2_cycle'] ?>><?= $ep[$k]['c2_cycle'] ?></td>
          <td class="checkValue_c2_max_stress decimal1 chartStressMax" <?= $epHisto2[$k]['c2_max_stress'] ?>><?= (isset($ep[$k]['c2_max_stress'])?$ep[$k]['c2_max_stress']*$area/1000:'') ?></td>
          <td class="checkValue_c2_min_stress decimal1" <?= $epHisto2[$k]['c2_min_stress'] ?>><?= (isset($ep[$k]['c2_min_stress'])?$ep[$k]['c2_min_stress']*$area/1000:'') ?></td>
          <td class="decimal2"><?= $ep[$k]['c2_max_strain'] ?></td>
          <td class="decimal2"><?= $ep[$k]['c2_min_strain'] ?></td>
          <td class="decimal2"<?= $epHisto2[$k]['val_2'] ?>><?= $ep[$k]['val_2'] ?></td>
          <td class="decimal2"<?= $epHisto2[$k]['val_4'] ?>><?= $ep[$k]['val_4'] ?></td>
          <td class="decimal2" <?= $epHisto2[$k]['val_5'] ?>><?= $ep[$k]['val_5'] ?></td>
          <td class="dCheckEp" data-dchecked="<?= max(0,$ep[$k]['check_rupture']) ?>" <?= $epHisto2[$k]['check_rupture'] ?>><?= $ep[$k]['check_rupture'] ?></td>
          <td class="dCheckEp selectable" data-dchecked="<?= max(0,$ep[$k]['d_checked']) ?>"  data-idepdchecked="<?= $ep[$k]['id_eprouvette'] ?>" <?= $epHisto2[$k]['d_checked'] ?>><?= $ep[$k]['d_checked'] ?></td>

        </tr>

      <?php endfor ?>
    </tbody>
  </table>


</div>

<script type="text/javascript" src="js/splitEprouvette.js"></script>
