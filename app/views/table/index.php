<?php
use app\models\Apartment;
?>
<form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th><input type="email" class="form-control" id="email" name="email" placeholder="Email" <?=(isset($params['email']) && $params['email'] != '') ? "value=\"".$params['email']."\"" : null?>></th>
            <th>Name</th>
            <th><select name="apartment" class="form-control">
                    <option value="">- Choose apartment -</option>
                    <?php foreach (Apartment::map(Apartment::getAllApartments(), 'id', 'address') as $key => $value) {?>
                    <option value="<?=$key?>" <?=(isset($params['apartment']) && $params['apartment'] == $key) ? 'selected' : null?>><?=$value?></option>
                    <?php } ?>
                    </select></th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $row) {?>

            <tr>
                <th scope="row"><?=$row->id?></th>
                <td><?=$row->email?></td>
                <td><?=$row->name?></td>
                <td><?=$row->getApartment()->address?></td>
                <td><?=$row->comment?></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</form>