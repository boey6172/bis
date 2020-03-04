<br>
<h3 class="box-title"><span class="fa fa-book"></span> Resident Details  </h3>
<div class="box-body ">
    <div class="col-md-6 projectDetails">
        <span class="info-box-number"> <?php echo $vm->resident->Fullname?> </span>
        <span class="info-box-number"><small>Age: <?php echo $vm->resident->age?>  </small></span>
        <span class="info-box-number"><small>Gender: <?php echo $vm->resident->Gender->description?></small></span>
        <span class="info-box-number"><small>Birthdate: <?php echo $vm->resident->birthday?></small></span>
        <span class="info-box-number"><small>Birth Place: <?php echo $vm->resident->birthplace?></small></span>
        <span class="info-box-number"><small>Civil Status: <?php echo $vm->resident->CivilStatus->description?></small></span>
        <span class="info-box-number"><small>Educational Attainment: <?php echo $vm->resident->educational_attainment?></small></span>
        <span class="info-box-number"><small>Occupation: <?php echo $vm->resident->occupation?></small></span>
    </div>
    
</div>