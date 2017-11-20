<?php
class LstSplitModel
{

protected $db;
private $id;


  public function __construct($db,$id)
  {
      $this->db = $db;
      $this->id = $id;
  }


  public function __set($property,$value) {
    if (is_numeric($value)){
      $this->$property = $value;
    }
    else {
      $this->$property = ($value=="")? "NULL" : $this->db->quote($value);
    }
  }




    public function getSplit() {
//ADD AFFICHAGE DESSIN en concat
		$req = 'SELECT id_tbljob, tbljobs.id_info_job,
          customer, job, split, po_number, devis, info_jobs.instruction as info_jobs_instruction, info_jobs.commentaire as info_jobs_commentaire, inOut_recommendation,schedule_recommendation,
          contacts.genre, contacts.lastname, contacts.surname, contacts.compagnie, contacts.email as email, contacts.telephone as telephone,
          contacts2.genre as genre2, contacts2.lastname as lastname2, contacts2.surname as surname2, contacts2.compagnie as compagnie2, contacts2.email as email2, contacts2.telephone as telephone2,
          contacts3.genre as genre3, contacts3.lastname as lastname3, contacts3.surname as surname3, contacts3.compagnie as compagnie3, contacts3.email as email3, contacts3.telephone as telephone3,
          contacts4.genre as genre4, contacts4.lastname as lastname4, contacts4.surname as surname4, contacts4.compagnie as compagnie4, contacts4.email as email4, contacts4.telephone as telephone4,
          tbljob_commentaire, tbljob_instruction, tbljob_commentaire_qualite, planning, tbljob_frequence,
          createur, t1.technicien as nomCreateur, t2.technicien as comCheckeur,
          statuts.id_statut, statut, etape, statut_color, test_type, test_type_abbr, ST, tbljobs.id_rawData, rawData.name,
          specification, ref_matiere, matiere, tbljobs.waveform, GROUP_CONCAT(DISTINCT dessin SEPARATOR " ") as dessin, GROUP_CONCAT(DISTINCT master_eprouvettes.id_dwg SEPARATOR " ") as id_dessin,
            GROUP_CONCAT( DISTINCT round(c_temperature,0) ORDER BY c_temperature DESC SEPARATOR \' / \') as temperature,
            GROUP_CONCAT( DISTINCT round(c_frequence,1) ORDER BY c_frequence DESC SEPARATOR \' / \') as c_frequence,
            GROUP_CONCAT( DISTINCT round(c_frequence_STL,1) ORDER BY c_frequence_STL DESC SEPARATOR \' / \') as c_frequence_STL,
          type1.consigne_type as c_type_1, type2.consigne_type as c_type_2, c_unite,
          type1.id_consigne_type as id_c_type_1, type2.id_consigne_type as id_c_type_2,
          DyT_SubC, DyT_expected, DyT_Cust, available_expected, report_send,
          (SELECT DyT_expected FROM tbljobs t WHERE t.id_info_job=tbljobs.id_info_job AND t.phase<tbljobs.phase AND DyT_expected IS NOT NULL ORDER BY phase DESC LIMIT 1) AS available,
          checked, comments, contacts.adresse,
contactST.id_contact as id_contactST, contactST.genre as genreST, contactST.lastname as lastnameST, contactST.surname as surnameST,entrepriseST.id_entreprise as id_entrepriseST, entrepriseST.entreprise as entrepriseST, entrepriseST.entreprise_abbr as entreprise_abbrST, refSubC,

          count(distinct master_eprouvettes.id_master_eprouvette) as nbep,
          count(distinct id_eprouvette) as nbtest,
          count(n_essai) as nbtestdone,
          COUNT(DISTINCT CASE WHEN n_essai is null THEN master_eprouvettes.id_master_eprouvette END) nbepleft,
          COUNT(DISTINCT CASE WHEN d_checked <=0 THEN master_eprouvettes.id_master_eprouvette END) nbepCheckedleft,

          sum(temps_essais) as tpstest,
          sum(if(temps_essais is null,null,if(temps_essais>24, temps_essais-24,0))) as hrsup,
          sum(if(temps_essais is null,

                      if(Cycle_final >0 AND c_frequence is not null and c_frequence !=0,
                        if(Cycle_STL is null and c_cycle_STL is null,
                          eprouvettes.Cycle_final/eprouvettes.c_frequence/3600,
                          if(Cycle_STL is null,
                             if(eprouvettes.Cycle_final>c_cycle_STL,(c_cycle_STL/c_frequence+(eprouvettes.Cycle_final-c_cycle_STL)/c_frequence_STL)/3600,
                              (eprouvettes.Cycle_final/c_frequence)/3600)
                            ,if(eprouvettes.Cycle_final>cycle_STL,
                                (cycle_STL/c_frequence+(eprouvettes.Cycle_final-cycle_STL)/c_frequence_STL)/3600,
                                (eprouvettes.Cycle_final/c_frequence)/3600)

                          )),
                      0)
                           ,temps_essais)) as tpscalc,

                    sum(if(if(temps_essais is null,
                      if(Cycle_final >0 AND c_frequence is not null and c_frequence !=0,
                        if(Cycle_STL is null and c_cycle_STL is null,
                          eprouvettes.Cycle_final/eprouvettes.c_frequence/3600,
                          if(Cycle_STL is null,
                             if(eprouvettes.Cycle_final>c_cycle_STL,(c_cycle_STL/c_frequence+(eprouvettes.Cycle_final-c_cycle_STL)/c_frequence_STL)/3600,
                              (eprouvettes.Cycle_final/c_frequence)/3600)
                            ,if(eprouvettes.Cycle_final>cycle_STL,
                                (cycle_STL/c_frequence+(eprouvettes.Cycle_final-cycle_STL)/c_frequence_STL)/3600,
                                (eprouvettes.Cycle_final/c_frequence)/3600)
                          )),
                      "")
                           ,temps_essais)>24,
                           if(temps_essais is null,
                      if(Cycle_final >0 AND c_frequence is not null and c_frequence !=0,
                        if(Cycle_STL is null and c_cycle_STL is null,
                          eprouvettes.Cycle_final/eprouvettes.c_frequence/3600,
                          if(Cycle_STL is null,
                             if(eprouvettes.Cycle_final>c_cycle_STL,(c_cycle_STL/c_frequence+(eprouvettes.Cycle_final-c_cycle_STL)/c_frequence_STL)/3600,
                              (eprouvettes.Cycle_final/c_frequence)/3600)
                            ,if(eprouvettes.Cycle_final>cycle_STL,
                                (cycle_STL/c_frequence+(eprouvettes.Cycle_final-cycle_STL)/c_frequence_STL)/3600,
                                (eprouvettes.Cycle_final/c_frequence)/3600)
                          )),
                      "")
                           ,temps_essais)-24,
                          0)) as tpssupcalc

				FROM tbljobs
				LEFT JOIN test_type ON test_type.id_test_type=tbljobs.id_type_essai
				LEFT JOIN info_jobs ON info_jobs.id_info_job=tbljobs.id_info_job
        LEFT JOIN eprouvettes ON eprouvettes.id_job=tbljobs.id_tbljob
        LEFT JOIN master_eprouvettes ON master_eprouvettes.id_master_eprouvette=eprouvettes.id_master_eprouvette
        LEFT JOIN dessins ON dessins.id_dessin=master_eprouvettes.id_dwg
        LEFT JOIN contacts ON contacts.id_contact=info_jobs.id_contact
        LEFT JOIN contacts  contacts2 ON contacts2.id_contact=info_jobs.id_contact2
        LEFT JOIN contacts  contacts3 ON contacts3.id_contact=info_jobs.id_contact3
        LEFT JOIN contacts  contacts4 ON contacts4.id_contact=info_jobs.id_contact4
        LEFT JOIN contacts contactST ON contactST.id_contact=tbljobs.id_contactST
        LEFT JOIN entreprises entrepriseST ON entrepriseST.id_entreprise=contactST.ref_customer
        LEFT JOIN tbljobs_temp ON tbljobs_temp.id_tbljobs_temp=tbljobs.id_tbljob
        LEFT JOIN statuts ON statuts.id_statut=tbljobs_temp.id_statut_temp
        LEFT JOIN matieres ON matieres.id_matiere=info_jobs.id_matiere_std
        LEFT JOIN rawData ON rawData.id_rawData=tbljobs.id_rawData
        LEFT JOIN consigne_types as type1 ON type1.id_consigne_type=tbljobs.c_1
        LEFT JOIN consigne_types as type2 ON type2.id_consigne_type=tbljobs.c_2
        LEFT JOIN techniciens as t1 on t1.id_technicien=tbljobs.modif
        LEFT JOIN techniciens as t2 on t2.id_technicien=tbljobs.checked


				WHERE id_tbljob='.$this->id.'
        AND eprouvette_actif=1
        AND master_eprouvette_actif=1
        GROUP BY id_tbljob';
//echo $req;
        return $this->db->getOne($req);
    }

    public function getEprouvettes() {

		$req = 'SELECT id_tbljob,
          GROUP_CONCAT( DISTINCT round(c_temperature,0) ORDER BY c_temperature DESC SEPARATOR \' / \') as temperature,
          COUNT(eprouvettes.id_eprouvette) as nbep

				FROM eprouvettes
        LEFT JOIN master_eprouvettes ON master_eprouvettes.id_master_eprouvette=eprouvettes.id_master_eprouvette
        LEFT JOIN enregistrementessais ON enregistrementessais.id_eprouvette=eprouvettes.id_eprouvette
        LEFT JOIN tbljobs ON tbljobs.id_tbljob=eprouvettes.id_job
        LEFT JOIN matieres ON matieres.id_matiere=tbljobs.id_matiere
				WHERE id_tbljob='.$this->id.'
          AND eprouvette_actif=1
          AND master_eprouvette_actif=1
        GROUP BY id_tbljob';
//echo $req;
        return $this->db->getOne($req);
    }



    public function updateDataInput(){
      $reqUpdate='UPDATE `tbljobs` SET
        `id_contactST` = '.$this->id_contactST.',
        `specification` = '.$this->specification.',
        `waveform` = '.$this->waveform.',
        `id_rawData` = '.$this->id_rawData.',
        `c_1` = '.$this->c_type_1.',
        `c_2` = '.$this->c_type_2.',
        `c_unite` = '.$this->c_unite.',
        `tbljob_frequence` = '.$this->tbljob_frequence.',
        `DyT_Cust` = '.$this->DyT_Cust.',
        `tbljob_instruction` = '.$this->tbljob_instruction.',
        `comments` = '.$this->comments.',
        `DyT_expected` = '.$this->DyT_expected.',
        `checked` = 0,
        `modif` = '.$_COOKIE['id_user'].'
       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
//echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
      			echo json_encode($maReponse);
    }

    public function updateData(){
      $reqUpdate='UPDATE `tbljobs` SET
        `refSubC` = '.$this->refSubC.'

       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
//echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
      			echo json_encode($maReponse);
    }

    public function updateCommentaire(){
      $reqUpdate='UPDATE `tbljobs` SET
        `tbljob_commentaire` = '.$this->tbljob_commentaire.'
       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
//echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
      			echo json_encode($maReponse);
    }

    public function deleteTechSplit(){
      $reqDelete='DELETE FROM tech_split
      WHERE id_split='.$this->id.';';
      //echo $reqDelete;
      $result = $this->db->query($reqDelete);

      $maReponse = array('result' => 'ok', 'req'=> $reqDelete, 'id_tbljob' => $this->id);
      echo json_encode($maReponse);
    }
    public function updateCommentaireQuality(){
      $reqUpdate='UPDATE `tbljobs` SET
        `tbljob_commentaire_qualite` = '.$this->tbljob_commentaire_qualite.'
       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
//echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
      			echo json_encode($maReponse);
    }

    public function updateCheck(){
      $reqUpdate='UPDATE `tbljobs` SET
        `checked` = '.$_COOKIE['id_user'].'
       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
//echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
      			echo json_encode($maReponse);
    }

    public function updatePlanning($planning){
      $reqUpdate='UPDATE `tbljobs` SET
        `planning` = '.$planning.'
       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
    //echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
            echo json_encode($maReponse);
    }

    public function updateReportSend($id_reportSend){
      $reqUpdate='UPDATE `tbljobs` SET
        `report_send` = '.$this->db->quote($id_reportSend).'
       WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
    //echo $reqUpdate;
      $result = $this->db->query($reqUpdate);

      $maReponse = array('result' => 'ok', 'req'=> $reqUpdate, 'id_tbljob' => $this->id);
            echo json_encode($maReponse);
    }

    public function newSplit(){
      $reqInsert='INSERT INTO `tbljobs` (id_info_job, id_type_essai) VALUES ('.$this->id_info_job.','.$this->id_test_type.');';
      echo $reqInsert;
      $this->db->execute($reqInsert);
      return $this->db->lastId();
    }


    public function updateSplitNumber($phase){
      $reqUpdate='UPDATE `tbljobs` SET `phase` = '.$phase.', `split` = '.$this->splitNumber.' WHERE `tbljobs`.`id_tbljob` = '.$this->id.';';
      echo $reqUpdate;
      $this->db->query($reqUpdate);

    }

    public function findStatut(){
      $req='SELECT
          sum(if(master_eprouvette_inOut_A is null,0,1)) as nbInOut_A,
          if(checked>0,1,0) as checked,

          count(distinct master_eprouvettes.id_master_eprouvette) as nbMasterEp,
          count(master_eprouvettes.id_master_eprouvette) as nbEp,
          count(eprouvettes.id_eprouvette) as nbTestPlanned,

          count(eprouvettes.id_eprouvette) - if(count(n_fichier)=0, sum(if(d_checked > 0,1,0)),count(n_fichier)) as nbTestLeft,

          sum(if(c_type_1_val is null OR c_type_2_val is null OR n_fichier is not null,0,1)) as nbConsLeft,
          sum(if(c_type_1_val is null OR c_type_2_val is null OR n_fichier is not null OR master_eprouvette_inOut_A is null,0,1)) as nbConsLeftAndInOut_A,

          sum(if(c_checked>0 AND d_checked <=0,1,0)) as nbConsLeftAux,
          sum(if(c_checked>0 AND d_checked <=0 AND master_eprouvette_inOut_A is not null,1,0)) as nbConsLeftAndInOut_AAux,

          sum(if(master_eprouvette_inOut_A is not null AND
            (SELECT ST FROM eprouvettes ep
              LEFT JOIN tbljobs ON tbljobs.id_tbljob=ep.id_job
              LEFT JOIN test_type on test_type.id_test_type=tbljobs.id_type_essai
              WHERE ep.id_master_eprouvette= (SELECT id_master_eprouvette FROM eprouvettes epp WHERE epp.id_eprouvette=eprouvettes.id_eprouvette)
                AND ep.eprouvette_inOut_B is null
                AND ep.eprouvette_actif=1
                ORDER BY phase asc
                LIMIT 1)=1,1,0)) as nbSubC,
          sum(if(master_eprouvette_inOut_A is not null AND
              (SELECT local FROM eprouvettes ep
                LEFT JOIN tbljobs tbljoblocal ON tbljoblocal.id_tbljob=ep.id_job
                LEFT JOIN test_type on test_type.id_test_type=tbljoblocal.id_type_essai
                WHERE ep.id_master_eprouvette= (SELECT id_master_eprouvette FROM eprouvettes epp WHERE epp.id_eprouvette=eprouvettes.id_eprouvette)
                  AND ep.eprouvette_inOut_B is null
                  AND ep.eprouvette_actif=1
                  AND tbljoblocal.phase<tbljobs.phase
                  ORDER BY tbljoblocal.phase asc
                  LIMIT 1)=1
              ,1,0)) as nbLocal,


          sum(if(n_fichier is not null and check_rupture <=0,1,0)) as running,
          sum(if(c_type_1_val is null OR c_type_2_val is null,0,1)) as nbCons,
          if(count(n_fichier)=0, sum(if(d_checked > 0,1,0)),count(n_fichier)) as nbtest,
          sum(if(d_checked>0,0,1)) as nbUnDChecked

        FROM eprouvettes
        LEFT JOIN master_eprouvettes ON master_eprouvettes.id_master_eprouvette=eprouvettes.id_master_eprouvette
        LEFT JOIN enregistrementessais ON enregistrementessais.id_eprouvette=eprouvettes.id_eprouvette
        LEFT JOIN tbljobs ON tbljobs.id_tbljob=eprouvettes.id_job
        LEFT JOIN test_type ON test_type.id_test_type=tbljobs.id_type_essai
        LEFT JOIN info_jobs ON info_jobs.id_info_job=tbljobs.id_info_job

        WHERE tbljobs.id_tbljob= '. $this->id.'
        AND master_eprouvette_actif=1
        AND eprouvette_actif=1
        GROUP BY tbljobs.id_tbljob
        ';

        //echo $req;

      $state = $this->db->getOne($req);


      $statut='';
      $id_statut=0;

      if ($state['nbInOut_A']<$state['nbMasterEp']) {
        $statut='awaiting specimen';
        $id_statut=120;
      }

      if ($state['nbLocal'] > 0) {
        $statut='awaiting InHouse';
        $id_statut=130;
      }
      elseif ($state['nbSubC'] > 0) {
        $statut='awaiting SubC';
        $id_statut=122;
      }
      elseif ($state['checked']==1 AND $state['nbConsLeftAndInOut_A']>1 AND $state['nbTestLeft']>0) {
        $statut='ready to test';
        $id_statut=140;
      }
      elseif ($state['nbConsLeft']==0 AND $state['nbTestLeft']>0 AND $state['nbInOut_A']>=$state['nbMasterEp']) {
        $statut='inHouse but need condition';
        $id_statut=152;
      }


      if ($state['nbConsLeftAux']>0 AND $state['nbTestLeft']>0 AND $state['nbInOut_A']>=$state['nbTestLeft']) {
        $statut='Ready to test Aux';
        $id_statut=140;
      }
      elseif ($state['nbConsLeft']==0 AND $state['nbTestLeft']>0 AND $state['nbConsLeftAndInOut_A']>0) {
        $statut='Testing on Hold Condition';
        $id_statut=152;
      }


      if ($state['running']>=1) {
        if ($state['nbTestLeft']==0) {
          $statut='running last spec';
          $id_statut=154;
        }
        elseif ($state['nbConsLeft']==0) {
          $statut='running last cond';
          $id_statut=151;
        }
        else {
          $statut='running';
          $id_statut=150;
        }
      }
      else {
        if ($state['nbUnDChecked']==0 AND $state['nbTestLeft']==0) {
          $statut='Emission rapport';
          $id_statut=180;
        }
        elseif ($state['nbUnDChecked']>0 AND $state['nbTestLeft']==0) {
          $statut='Emission rapport mais check ep demandé';
          $id_statut=180;
        }
      }

      $this->updateStatut($id_statut);

    }


}
