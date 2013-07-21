<?php
?>
<form action="?" method="post">
    <table>
        <tr>
            <td><label for="absender"><?= _("Absender") ?></label></td>
            <td><input type="text" name="absender" id="absender"></td>
        </tr>
        <tr>
            <td><label for="transporter"><?= _("Übertragungsweg") ?></label></td>
            <td>
                <select name="transporter" id="transporter">
                    <option value="funk"><?= _("Funk") ?></option>
                    <option value="phone"><?= _("Telefon") ?></option>
                    <option value="fax"><?= _("Fax") ?></option>
                    <option value="email"><?= _("Email") ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="adressat"><?= _("Adressat") ?></label></td>
            <td><input type="text" name="adressat" id="adressat"></td>
        </tr>
        
        <tr>
            <td><label for="message"><?= _("Nachricht") ?></label></td>
            <td><textarea name="message" id="message"></textarea></td>
        </tr>
    </table>
</form>