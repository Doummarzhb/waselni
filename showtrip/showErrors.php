<?php
if (isset($_GET['err'])) {
    if ($_GET['err'] == $row['tripID'] ) {
        # code...
        echo "<td class = dynamic>request already sended</td>";
    }else {
        # code...
        echo "<td class = dynamic></td>";
    }
}
if (isset($_GET['req'])) {
    if ($_GET['req'] == $row['tripID'] ) {
        # code...
        echo "<td class = dynamic>request sent</td>";
    }else {
        # code...
        echo "<td class = dynamic></td>";
    }
}


?>