<table class="table table-striped table-bordered">
    <tr>
        <td>№</td>
        <td>Название проверки</td>
        <td>Статус</td>
        <td></td>
        <td>Текущее состояние</td>
    </tr>
    <?php foreach($data as $key => $inspection){ ?>
        <tr>
            <td rowspan="2"><?=$key?></td>
            <td rowspan="2"><?=$inspection['title']?></td>
            <td rowspan="2" class="text-center <? if($inspection['status'] === 'OK') echo 'success'; else echo 'danger'?>">
                <?=$inspection['status']?></td>
            <td>Состояное</td>
            <td><?=$inspection['state']?></td>
        </tr>
            <tr>
            <td>Рекомендации</td>
            <td><?=$inspection['recom']?></td>
        </tr>
    <?} ?>
</table>

<input type="hidden" value="done" name="result">
<a role="button" type="button" id='back_btn' href="http://searchfile.local/" class="btn btn-primary pull-right" type="submit">Return to main page</a>
