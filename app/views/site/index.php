<?php
/**
 * @var $data array
 */
?>
<div class="row" style="padding-top: 80px;">
    <div class="col-md-6 col-md-offset-3 jumbotron">
        <form method="post" action="/ajax/request">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" datatype="check">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" datatype="check">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="apartment">Apartment</label>
                    <select class="form-control" name="apartment" id="apartment">
                        <?php foreach ($data as $row):?>
                            <option value="<?=$row->id?>"><?=$row->address?> (<?=$row->note?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea id="comment" class="form-control" rows="3" name="comment"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>