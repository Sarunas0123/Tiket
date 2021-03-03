<link rel="stylesheet" href="index.css">
<?php
require "inc/functions.php";
if(isset($_POST['send'])):?>
    <?php if (!preg_match('/^([A-Z]+[a-z]{4,20})/', $_POST['name'])) {
    $validation [] = "Blogai ivedete varda";
    }
    if (!preg_match('/^([A-Z]+[a-z]{4,20})/', $_POST['lastname'])) {
    $validation [] = "Blogai ivedete pavarde";
    }
    if (!preg_match('/^([1-6]+[0-9]{10})/', $_POST['asmenskodas'])) {
    $validation [] = "Blogai ivedete asmens koda";
    }
    if (!preg_match('/^([0-9])/', $_POST['kaina'])) {
    $validation [] = "Blogai ivedete kaina";
    }
    if (!preg_match('/^([A-Za-z0-9).-]{3})/', $_POST['message'])) {
    $validation [] = "Blogai ivedete zinute";
    }
    if (!isset($_POST['skrydis'])) {
    $validation [] = "nepasirinkote skrydzio numerio";
    }
    if (!isset($_POST['bagazas'])) {
    $validation [] = "nepasirinkote bagazo dydzio";
    }
    if (!isset($_POST['isskrendi'])) {
    $validation [] = "nepasirinkote is kur skrendate";
    }
    if (!isset($_POST['iskrendi'])) {
    $validation [] = "nepasirinkote i kur skrendate";
    }
    ?>
        <?php if (empty($validation)):?>
            <table>
                <td>Vardas</td>
                <td>Pavarde</td>
                <td>Asmens kodas</td>
                <td>kaina</td>
                <td>Pastaba</td>
                <td>Skrydzio nr.</td>
                <td>Bagazas</td>
                <td>Is kur</td>
                <td>I kur</td>
                <td>Id</td>
                <td>Bilietas</td>

                <?php foreach (printData() as $ooe):?>
                <?php if($ooe != ""):?>
                <tr>
                    <?php $ooe = explode(",", $ooe)?>
                    <?php foreach ($ooe as $goble):?>
                        <td><?=$goble;?></td>
                    <?php endforeach; ?>
                    <td><a id="<?= $ooe[9]?>" href="ticket.php?id=<?= $ooe[9];?>">here</a></td>
                </tr>
                    <?php endif;?>
                <?php endforeach; ?>
            </table>
        <?php else:
            {
                foreach ($validation as $mess => $go):
                    echo "$go || ";
                endforeach;
            }?>
        <?php endif;?>
<?php endif;?>
<body>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="name">Vardas</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <small class="form-text text-muted">Iveskite varda</small>
        </div>
        <div class="form-group">
            <label for="lastname">Pavarde</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastNameHelp">
            <small class="form-text text-muted">Iveskite pavarde</small>
        </div>
        <div class="form-group">
            <label for="InputAsmuo">asmens kodas</label>
            <input type="text" class="form-control" id="InputAsmuo" name="asmenskodas" aria-describedby="asmensHelp">
            <small class="form-text text-muted">Jusu asmens kodas</small>
        </div>
        <div class="form-group">
            <label for="InputKaina">kaina</label>
            <input type="number" class="form-control" id="InputKaina" name="kaina" aria-describedby="kainaHelp">
            <small class="form-text text-muted">€</small>
        </div>
        <div class="form-group">
            <select class="form-control" name="skrydis">
                <option selected disabled>-- Pasirinkite skrydzio numeri</option>
                <?php foreach($skrydis1 as $skrydis):?>
                    <option value="<?=$skrydis;?>"><?= $skrydis?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="bagazas">
                <option selected disabled>-- Pasirinkite bagazo didi</option>
                <?php foreach($bagaz as $bagazas):?>
                    <option value="<?=$bagazas;?>"><?= $bagazas?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="isskrendi">
                <option selected disabled>-- Pasirinkite is kur skrisite</option>
                <?php foreach($iskur as $isskur):?>
                    <option value="<?=$isskur;?>"><?= $isskur?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="iskrendi">
                <option selected disabled>-- Pasirinkite i kur skrisite</option>
                <?php foreach($ikur as $iikur):?>
                    <option value="<?=$iikur;?>"><?= $iikur?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="message">Pastabos</label>
            <textarea class="form-control" rows="3" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send">Siusti</button>
    </form>
</div>
</body>