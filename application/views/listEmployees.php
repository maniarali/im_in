<div class="col-md-9">
            <div class="profile-content">
			   My Monthly Attendance
            
                <div>
                    <table border="0" class="table table-striped" width="100%">
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Status</th>
                        <th>Block/Unblock</th>
                        </tr>
                        <?php foreach ($employees as $employee) : ?>
                        <tr>
                            <td> <?php echo '<a href="' . site_url('employees/viewEmployee/' . $employee->id) . '">'.$employee->fullName.'</a>'; ?> </td>
                            <td> <?php echo $employee->email; ?> </td>
                            <td> <?php echo $employee->role; ?> </td>
                            <td> <?php echo '<a href="' . site_url('employees/edit/' . $employee->id) . '">Edit</a>'; ?> </td>
                            <td> <?php echo $employee->status ? 'Active' : 'In-Active'; ?> </td>
                            <td> <?php echo $employee->status ? '<a href="' . site_url('employees/delete/' . $employee->id) . '">Delete</a>' : '<a href="' . site_url('employees/retrieve/' . $employee->id) . '">Retrieve</a>'; ?></td>
                        <?php endforeach; ?>
                        </tr>
                    </table>
                </div>

            </div>
		</div>
	</div>
</div>
