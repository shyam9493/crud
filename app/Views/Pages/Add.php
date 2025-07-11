<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee - CRUD Application</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Add New Employee</h4>
                            <a href="<?= base_url('users') ?>" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>Back to List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('users/store') ?>" method="POST" id="addUserForm">
                            <?= csrf_field() ?>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="employee_id" class="form-label">
                                        <i class="fas fa-id-card me-1"></i>Employee ID <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control <?= session('errors.employee_id') ? 'is-invalid' : '' ?>" 
                                           id="employee_id" 
                                           name="employee_id" 
                                           value="<?= old('employee_id') ?>" 
                                           placeholder="Enter Employee ID"
                                           maxlength="20"
                                           required>
                                    <?php if (session('errors.employee_id')): ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.employee_id') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-user me-1"></i>Full Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" 
                                           id="name" 
                                           name="name" 
                                           value="<?= old('name') ?>" 
                                           placeholder="Enter Full Name"
                                           maxlength="100"
                                           required>
                                    <?php if (session('errors.name')): ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.name') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope me-1"></i>Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" 
                                           class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" 
                                           id="email" 
                                           name="email" 
                                           value="<?= old('email') ?>" 
                                           placeholder="Enter Email Address"
                                           maxlength="100"
                                           required>
                                    <?php if (session('errors.email')): ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">
                                        <i class="fas fa-phone me-1"></i>Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" 
                                           class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" 
                                           id="phone" 
                                           name="phone" 
                                           value="<?= old('phone') ?>" 
                                           placeholder="Enter Phone Number"
                                           maxlength="20"
                                           required>
                                    <?php if (session('errors.phone')): ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.phone') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="designation" class="form-label">
                                    <i class="fas fa-briefcase me-1"></i>Designation <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control <?= session('errors.designation') ? 'is-invalid' : '' ?>" 
                                       id="designation" 
                                       name="designation" 
                                       value="<?= old('designation') ?>" 
                                       placeholder="Enter Job Title/Position"
                                       maxlength="100"
                                       required>
                                <?php if (session('errors.designation')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.designation') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="<?= base_url('users') ?>" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-times me-1"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Save Employee
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = ['employee_id', 'name', 'email', 'phone', 'designation'];
            
            requiredFields.forEach(function(fieldName) {
                const field = document.getElementById(fieldName);
                const value = field.value.trim();
                
                // Remove existing error classes
                field.classList.remove('is-invalid');
                
                // Check if field is empty
                if (value === '') {
                    field.classList.add('is-invalid');
                    isValid = false;
                }
                
                // Email validation
                if (fieldName === 'email' && value !== '') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields correctly.');
            }
        });

        // Real-time validation
        document.querySelectorAll('input[required]').forEach(function(input) {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });

        // Email real-time validation
        document.getElementById('email').addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value.trim() !== '' && !emailRegex.test(this.value)) {
                this.classList.add('is-invalid');
            } else if (this.value.trim() !== '') {
                this.classList.remove('is-invalid');
            }
        });
    </script>
</body>
</html>
