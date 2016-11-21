<div class="col-md-9">
            <div class="profile-content">
			   <h1 class="heading"> My Monthly Attendance </h1>
               <hr/>
               <?php if ($attendances) : ?>
                <div>
                   <table border="0" class="table table-striped" width="100%">
                        <tr>
                        <th>Date</th>
                        <th>Present</th>
                        <th>Time in</th>
                        <th>Time Out</th>
                        <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'manager') : ?>
                            <th> Employee IP</th>
                        <?php endif ; ?>
                        </tr>
                            <?php foreach ($attendances as $attendance) : ?>
                            <tr>
                                <td> <?php echo date('d-M-Y',strtotime($attendance->date)); ?> </td>
                                <td> <?php echo $attendance->absent ? 'A' : 'P'; ?> </td>
                                <td> <?php echo $attendance->timeIn ? date('H:i:s',strtotime($attendance->timeIn)) : '-'; ?> </td>
                                <td> <?php echo $attendance->timeOut ? date('H:i:s',strtotime($attendance->timeOut)) : '-'; ?> </td>
                                <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'manager') : ?>
                                    <td> <?php echo $attendance->ipAddress ? $attendance->ipAddress : '-' ; ?> </td>
                                <?php endif ; ?>
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
