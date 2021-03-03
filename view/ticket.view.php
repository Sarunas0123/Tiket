<head>
    <link rel="stylesheet" href="index.css">

</head>
<?php
require "inc/functions.php";
$id = $_GET['id'];
?>
<?php foreach(readData() as $data):?>
    <?php if($data !=""):?>
        <?php $data = explode(",", $data)?>
        <?php if($id == $data[9]):?>
            <div class="MainTicket">
                <div class="Vaziuoja">
                    <div class="Iskur">
                        <div class="Time">12:00</div>
                        <div class="log">Atvykimas is:</div>
                        <div class="tLog"><?=$data[6]?></div>
                    </div>
                    <div class="Ikur">
                        <div class="Time">12:00</div>
                        <div class="log">Isvykimas i:</div>
                        <div class="tLog"><?=$data[7]?></div>
                    </div>
                </div>
                <div class="Ident">
                    <div class="Vardai">Vardas: <?=$data[0]?></div>
                    <div class="Vardai">Pavarde: <?=$data[1]?></div>
                    <div class="Id">Id: <?=$data[2]?></div>
                </div>
                <div class="Money">
                    <div class="Price">Kaina: <?=$data[3]?></div>
                    <div class="Baggage">Bagazas: <?=$data[5]?></div>
                </div>
                <div class="Blabber"><?=$data[8]?></div>
            </div>
        <?php endif;?>
    <?php endif;?>
<?php endforeach;?>
