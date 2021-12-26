
	<div class="container">
		<div class="row">
            

			<h1>Notifications</h1>
			<table class="table table-hover" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>idNotification</th>
                        <th>message</th>
                        <th>date</th>

                    </tr>
                </thead>
                <?php for($i=0;$i<count($notif);$i++){?>
                <tr>
                    <td><?php echo $notif[$i]['id'];?> </td>
                    <td> <?php echo $notif[$i]['message'];?> </td>
                    <td> <?php echo $notif[$i]['date'];?> </td>
                </tr>
                <?php } ?>
            </table>
        
		</div>
	</div>
