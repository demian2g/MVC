<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Email</th>
        <th>Name</th>
        <th>Apartment</th>
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