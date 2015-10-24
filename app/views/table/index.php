<?php
use app\models\Apartment;
?>
<form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th><input type="email" class="form-control" id="email" name="email" placeholder="Email"></th>
            <th>Name</th>
            <th><select name="apartment" class="form-control">
                    <option value="">- Choose apartment -</option>
                    <?php foreach (Apartment::map(Apartment::getAllApartments(), 'id', 'address') as $key => $value) {?>
                    <option value="<?=$key?>"><?=$value?></option>
                    <?php } ?>
                    </select></th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $row) {?>

            <tr class="detach">
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