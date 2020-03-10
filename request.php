<?php
    include 'head.php';
?>

<?php
    $link = mysqli_connect('localhost', 'root', '', 'mymoscow');    
    mysqli_set_charset($link, "utf8");

    if(!empty($_GET) && !empty($_GET['del'])) {
        $query = "DELETE FROM form WHERE id IN(" . implode(',', $_GET['del']) . ")";

        $res = mysqli_query($link, $query);

        if (!$res) {
            var_dump(mysqli_error($link));
        }
    }

    $query = "SELECT * FROM form";
    $res = mysqli_query($link, $query);

    $form = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $form [] = $row;
    }

    $heads = array_keys($form[0]);

    mysqli_close($link);
?>

<div class="request">
    <h1>Заявки</h1>
    <form method="GET" action="">
        <table>
            <thead>
                <tr>
                    <?php foreach($heads as $head):?>
                        <th><?=$head?></th>
                    <?php endforeach;?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($form as $id=>$row):?>
                    <tr>
                        <?php foreach($row as $key=>$cell):?>
                            <td>
                                <?php if($key === 'id'):?>
                                    <input type="checkbox" value="<?=$cell?>" id="<?="row_$id"?>" name="del[]">
                                <?php endif;?>
                                <label for="<?="row_$id"?>">
                                    <?php if($key === 'id'):?>
                                        <?=$cell?>
                                    <?php endif;?>
                                    <?php if($key === 'fio'):?>
                                        <input type="text" value="<?=$cell?>" id="<?="row_$fio"?>" name="">
                                    <?php endif;?>
                                    <?php if($key === 'email'):?>
                                        <input type="text" value="<?=$cell?>" id="<?="row_$email"?>" name="">
                                    <?php endif;?>
                                    <?php if($key === 'tel'):?>
                                        <input type="text" value="<?=$cell?>" id="<?="row_$tel"?>" name="">
                                    <?php endif;?>
                                    <?php if($key === 'message'):?>
                                        <input type="text" value="<?=$cell?>" id="<?="row_$message"?>" name="">
                                    <?php endif;?>
                                    <?php if($key === 'reaction'):?>
                                        <input type="text" value="<?=$cell?>" id="<?="row_$reaction"?>" name="">
                                    <?php endif;?>
                                </label>
                            </td>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <input type="submit" value="Удалить">
    </form>
</div>

<?php
    include 'footer.php';
?>