<div class="col-md-9">
            <div class="profile-content">
			   My Monthly Attendance
            
                <div>
                    <table border="5" width="100%">
                        <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Edit</td>
                        <td>Status</td>
                        <td>Block/Unblock</td>
                        </tr>
                        <?php foreach ($employees as $employee) : ?>
                        <tr>
                            <td> <?php echo $employee->fullName; ?> </td>
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
