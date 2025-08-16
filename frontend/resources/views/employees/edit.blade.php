<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-header {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
            padding: 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="35" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="45" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="65" cy="15" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="15" cy="60" r="2.5" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 25s linear infinite;
        }
        
        @keyframes float {
            0% { transform: rotate(0deg) translate(0, 0); }
            100% { transform: rotate(360deg) translate(0, 0); }
        }
        
        .form-header h2 {
            position: relative;
            z-index: 2;
            margin: 0;
            font-weight: 300;
            font-size: 2.2rem;
        }
        
        .form-header .subtitle {
            position: relative;
            z-index: 2;
            opacity: 0.9;
            margin-top: 0.5rem;
            font-size: 1.1rem;
        }
        
        .employee-badge {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            display: inline-block;
            font-weight: 500;
        }
        
        .form-body {
            padding: 3rem;
        }
        
        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }
        
        .form-label i {
            margin-right: 0.5rem;
            color: #f39c12;
            width: 16px;
        }
        
        .form-control, .form-select {
            border: 2px solid #e1e8ed;
            border-radius: 15px;
            padding: 1rem 1.2rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #f39c12;
            box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
            transform: translateY(-2px);
        }
        
        .form-control::placeholder {
            color: #a0aec0;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }
        
        .form-select {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="none" stroke="%23f39c12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 5l6 6 6-6"/></svg>');
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
            padding-right: 3rem;
        }
        
        .btn-container {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }
        
        .btn-update-custom {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            border: none;
            border-radius: 25px;
            padding: 1rem 2.5rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
            flex: 1;
            min-width: 150px;
        }
        
        .btn-update-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(243, 156, 18, 0.4);
            color: white;
        }
        
        .btn-secondary-custom {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            border-radius: 25px;
            padding: 1rem 2.5rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.3);
            flex: 1;
            min-width: 150px;
        }
        
        .btn-secondary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(108, 117, 125, 0.4);
            color: white;
        }
        
        .changes-indicator {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border-left: 4px solid #f39c12;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #856404;
            display: none;
        }
        
        .changes-indicator.show {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }
        
        .changes-indicator h6 {
            color: #f39c12;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .form-tips {
            background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
            border-left: 4px solid #f39c12;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #2c3e50;
        }
        
        .form-tips h6 {
            color: #f39c12;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .required-indicator {
            color: #e74c3c;
            margin-left: 0.3rem;
        }
        
        .current-value {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        .field-changed {
            border-color: #f39c12 !important;
            background: rgba(243, 156, 18, 0.05);
        }
        
        @media (max-width: 768px) {
            .form-body {
                padding: 2rem;
            }
            
            .form-header {
                padding: 2rem;
            }
            
            .form-header h2 {
                font-size: 1.8rem;
            }
            
            .btn-container {
                flex-direction: column;
            }
            
            .btn-update-custom,
            .btn-secondary-custom {
                min-width: 100%;
            }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .original-data {
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2><i class="fas fa-user-edit me-3"></i>Edit Employee</h2>
            <p class="subtitle">Update employee information</p>
            <div class="employee-badge">
                <i class="fas fa-id-badge me-2"></i>
                Employee ID: {{ $employee['employee_id'] ?? 'N/A' }}
            </div>
        </div>

        <div class="form-body">
            <div class="form-tips fade-in">
                <h6><i class="fas fa-info-circle me-2"></i>Edit Information</h6>
                <p class="mb-0">Modify the employee details below. Changes will be highlighted automatically. All fields are required.</p>
            </div>

            <div class="changes-indicator" id="changesIndicator">
                <h6><i class="fas fa-exclamation-circle me-2"></i>Unsaved Changes</h6>
                <p class="mb-0">You have made changes to this employee's information. Don't forget to save your changes.</p>
            </div>

            <!-- Store original values for change detection -->
            <div class="original-data">
                <input type="hidden" id="originalName" value="{{ $employee['name'] }}">
                <input type="hidden" id="originalAddress" value="{{ $employee['address'] }}">
                <input type="hidden" id="originalDepartment" value="{{ $employee['department_id'] }}">
            </div>

            <form action="{{ route('employees.update', $employee['id']) }}" method="POST" id="employeeForm">
                @csrf
                @method('PUT')

                <div class="form-group fade-in" style="animation-delay: 0.1s;">
                    <label class="form-label">
                        <i class="fas fa-user"></i>
                        Full Name
                        <span class="required-indicator">*</span>
                    </label>
                    <div class="current-value">
                        <small><strong>Current:</strong> {{ $employee['name'] }}</small>
                    </div>
                    <input type="text" 
                           name="name" 
                           id="nameInput"
                           class="form-control" 
                           value="{{ $employee['name'] }}"
                           placeholder="Enter employee's full name"
                           required>
                </div>

                <div class="form-group fade-in" style="animation-delay: 0.2s;">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Address
                        <span class="required-indicator">*</span>
                    </label>
                    <div class="current-value">
                        <small><strong>Current:</strong> {{ $employee['address'] ?: 'Not specified' }}</small>
                    </div>
                    <textarea name="address" 
                              id="addressInput"
                              class="form-control" 
                              placeholder="Enter complete address including street, city, postal code"
                              required>{{ $employee['address'] }}</textarea>
                </div>

                <div class="form-group fade-in" style="animation-delay: 0.3s;">
                    <label class="form-label">
                        <i class="fas fa-building"></i>
                        Department
                        <span class="required-indicator">*</span>
                    </label>
                    <div class="current-value">
                        <small><strong>Current:</strong> 
                            @foreach ($departments as $dept)
                                @if($employee['department_id'] == $dept['id'])
                                    {{ $dept['department_name'] }}
                                    @break
                                @endif
                            @endforeach
                        </small>
                    </div>
                    <select name="department_id" id="departmentInput" class="form-select" required>
                        @foreach ($departments as $dept)
                            <option value="{{ $dept['id'] }}" {{ $employee['department_id'] == $dept['id'] ? 'selected' : '' }}>
                                {{ $dept['department_name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="btn-container fade-in" style="animation-delay: 0.4s;">
                    <button type="submit" class="btn btn-update-custom" id="updateBtn">
                        <i class="fas fa-save me-2"></i>
                        Update Employee
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary-custom" id="cancelBtn">
                        <i class="fas fa-arrow-left me-2"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('employeeForm');
    const changesIndicator = document.getElementById('changesIndicator');
    const updateBtn = document.getElementById('updateBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    
    // Get original values
    const originalName = document.getElementById('originalName').value;
    const originalAddress = document.getElementById('originalAddress').value;
    const originalDepartment = document.getElementById('originalDepartment').value;
    
    // Get input elements
    const nameInput = document.getElementById('nameInput');
    const addressInput = document.getElementById('addressInput');
    const departmentInput = document.getElementById('departmentInput');
    
    let hasChanges = false;
    
    // Check for changes
    function checkForChanges() {
        const nameChanged = nameInput.value.trim() !== originalName.trim();
        const addressChanged = addressInput.value.trim() !== originalAddress.trim();
        const departmentChanged = departmentInput.value !== originalDepartment;
        
        // Update field styling
        nameInput.classList.toggle('field-changed', nameChanged);
        addressInput.classList.toggle('field-changed', addressChanged);
        departmentInput.classList.toggle('field-changed', departmentChanged);
        
        // Show/hide changes indicator
        hasChanges = nameChanged || addressChanged || departmentChanged;
        changesIndicator.classList.toggle('show', hasChanges);
        
        // Update button text
        if (hasChanges) {
            updateBtn.innerHTML = '<i class="fas fa-save me-2"></i>Save Changes';
            updateBtn.style.background = 'linear-gradient(135deg, #e74c3c 0%, #c0392b 100%)';
        } else {
            updateBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update Employee';
            updateBtn.style.background = 'linear-gradient(135deg, #f39c12 0%, #e67e22 100%)';
        }
    }
    
    // Add event listeners
    nameInput.addEventListener('input', checkForChanges);
    addressInput.addEventListener('input', checkForChanges);
    departmentInput.addEventListener('change', checkForChanges);
    
    // Add floating animation on focus
    [nameInput, addressInput, departmentInput].forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
        updateBtn.disabled = true;
        
        // Simple validation
        let isValid = true;
        [nameInput, addressInput, departmentInput].forEach(input => {
            if (input.hasAttribute('required')) {
                if (input.type === 'select-one' || input.tagName === 'SELECT') {
                    if (input.value === '') {
                        input.style.borderColor = '#e74c3c';
                        isValid = false;
                    } else {
                        input.style.borderColor = '#28a745';
                    }
                } else {
                    if (input.value.trim() === '') {
                        input.style.borderColor = '#e74c3c';
                        isValid = false;
                    } else {
                        input.style.borderColor = '#28a745';
                    }
                }
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            updateBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update Employee';
            updateBtn.disabled = false;
            
            // Show error message
            if (!document.querySelector('.error-message')) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger error-message mt-3';
                errorDiv.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Please fill in all required fields correctly.';
                form.appendChild(errorDiv);
                
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            }
        }
    });
    
    // Warn about unsaved changes when leaving
    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
    
    // Cancel button warning
    cancelBtn.addEventListener('click', function(e) {
        if (hasChanges) {
            if (!confirm('You have unsaved changes. Are you sure you want to leave without saving?')) {
                e.preventDefault();
            }
        }
    });
    
    // Real-time name validation
    nameInput.addEventListener('input', function() {
        const value = this.value.trim();
        if (value.length > 0 && value.length < 2) {
            this.setCustomValidity('Name must be at least 2 characters long');
        } else if (value.length > 50) {
            this.setCustomValidity('Name must not exceed 50 characters');
        } else {
            this.setCustomValidity('');
        }
    });
    
    // Initial check
    checkForChanges();
});
</script>

</body>
</html>