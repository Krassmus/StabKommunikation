<?php
?>
<table style="width: 100%;">
    <thead>
        <tr>
            <th><?= _("Nachricht") ?></th>
            <th><?= _("Von") ?></th>
            <th><?= _("Nach") ?></th>
            <th><?= _("Zeit") ?></th>
        </tr>
    </thead>
    <tbody>
        <? if ($messages && count($messages)) : ?>
        <? foreach ($messages as $message) : ?>
        <tr class="message" data-timestamp="<?= htmlReady($message['mkdate']) ?>">
            <td><?= htmlReady(mila($message['message'], 100)) ?></td>
            <td><?= htmlReady($message['absender']) ?></td>
            <td><?= htmlReady($message['adressat']) ?></td>
            <td><?= date("r", $message['mkdate']) ?></td>
        </tr>
        <? endforeach ?>
        <? else : ?>
        <tr>
            <td style="text-align: center;" colspan="4" class="nomessage"><?= _("Noch keine Nachrichten") ?></td>
        </tr>
        <? endif ?>
    </tbody>
</table>