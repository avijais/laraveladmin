<?php
    $alert = 'alert-danger';
    if(!empty($response) && count($response)>0)
    {
        $response = json_decode($response, true);
        if(count($response) > 0 && $response['status'] == 'success')
            $alert = 'alert-success'; ?>
        <div class="alert <?php echo $alert; ?>">
            <ul>
                <?php
                    foreach($response['message'] as $message)
                        echo '<li>'.$message.'</li>';
                ?>
            </ul>
        </div><?php
    }
?>