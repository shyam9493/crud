


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Employee Management</h1>
            <a href="<?= base_url('users/create') ?>" class="btn btn-success">Add New Employee</a>
        </div>
        
        <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php if(empty($users)){ ?>
                    <tr>
                        <td colspan="6" class="text-center">No users found</td>
                    </tr>
                <?php }else{ ?>

                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= esc($user['employee_id']) ?></td>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['phone']) ?></td>
                        <td><?= esc($user['designation']) ?></td>
                        <td>
                            <a href="<?= base_url('users/edit/' . $user['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= base_url('users/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>