<?php
echo "Lucky ticket";
?>

<form action="action.php" method="post" name="Action form">
    <p>Is the ticket a lucky?: <input type="text" name="number" value="<?php echo rand(100000,999999) ?>" </p>
    <p><button type="submit" name="Yes">Yes</button>
    <p><button type="submit" name="No">No</button>
</form>

