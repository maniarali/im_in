<div class="col-md-9">
            <div class="profile-content">
			   My Monthly Attendance
               <?php if (count($attendances)>0) : ?>
                <div>
                    <table border="5" width="100%">
                        <tr>
                        <td>Date</td>
                        <td>Present</td>
                        <td>Time in</td>
                        <td>Time Out</td>
                        </tr>
                            <?php foreach ($attendances as $attendance) : ?>
                            <tr>
                                <td> <?php echo date('d-m-Y',strtotime($attendance->date)); ?> </td>
                                <td> <?php echo $attendance->absent ? 'A' : 'P'; ?> </td>
                                <td> <?php echo $attendance->timeIn; ?> </td>
                                <td> <?php echo $attendance->timeOut; ?> </td>
                            <?php endforeach; ?>
                        </tr>
                    </table>
                </div>
                <p><?php echo $links; ?></p>
                <?php else : ?>
                    <div class="alert alert-info">
                        <strong>Error!</strong> No Records Found
                    </div>
                <?php endif; ?>
            </div>
		</div>
	</div>
</div>