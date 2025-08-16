<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Employee</title>
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
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="70" cy="10" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 20s linear infinite;
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
            color: #667eea;
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
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="none" stroke="%23667eea" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 5l6 6 6-6"/></svg>');
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
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 25px;
            padding: 1rem 2.5rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
            flex: 1;
            min-width: 150px;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
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
        
        .progress-bar {
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
            margin-top: 1rem;
            transition: width 0.3s ease;
        }
        
        .form-tips {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            border-left: 4px solid #667eea;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #2c3e50;
        }
        
        .form-tips h6 {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .required-indicator {
            color: #e74c3c;
            margin-left: 0.3rem;
        }
        
        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            transition: color 0.3s ease;
        }
        
        .form-control:focus + .input-icon {
            color: #667eea;
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
            
            .btn-primary-custom,
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
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2><i class="fas fa-user-plus me-3"></i>Add New Employee</h2>
            <p class="subtitle">Create a new employee profile</p>
        </div>

        <div class="form-body">
            <div class="form-tips fade-in">
                <h6><i class="fas fa-lightbulb me-2"></i>Quick Tips</h6>
                <p class="mb-0">Fill out all required fields to create a complete employee profile. Make sure all information is accurate before submitting.</p>
            </div>

            <form action="{{ route('employees.store') }}" method="POST" id="employeeForm">
                @csrf

                <div class="form-group fade-in" style="animation-delay: 0.1s;">
                    <label class="form-label">
                        <i class="fas fa-user"></i>
                        Full Name
                        <span class="required-indicator">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           class="form-control" 
                           placeholder="Enter employee's full name"
                           required>
                </div>

                <div class="form-group fade-in" style="animation-delay: 0.2s;">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Address
                        <span class="required-indicator">*</span>
                    </label>
                    <textarea name="address" 
                              class="form-control" 
                              placeholder="Enter complete address including street, city, postal code"
                              required></textarea>
                </div>

                <div class="form-group fade-in" style="animation-delay: 0.3s;">
                    <label class="form-label">
                        <i class="fas fa-building"></i>
                        Department
                        <span class="required-indicator">*</span>
                    </label>
                    <select name="department_id" class="form-select" required>
                        <option value="">-- Select Department --</option>
                        @foreach ($departments as $dept)
                            <option value="{{ $dept['id'] }}">{{ $dept['department_name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="progress-bar" id="progressBar" style="width: 0%;"></div>

                <div class="btn-container fade-in" style="animation-delay: 0.4s;">
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="fas fa-save me-2"></i>
                        Save Employee
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary-custom">
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
    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    const progressBar = document.getElementById('progressBar');
    
    // Update progress bar based on filled inputs
    function updateProgress() {
        let filledInputs = 0;
        inputs.forEach(input => {
            if (input.type === 'select-one') {
                if (input.value !== '') filledInputs++;
            } else {
                if (input.value.trim() !== '') filledInputs++;
            }
        });
        
        const progress = (filledInputs / inputs.length) * 100;
        progressBar.style.width = progress + '%';
    }
    
    // Add event listeners to all inputs
    inputs.forEach(input => {
        input.addEventListener('input', updateProgress);
        input.addEventListener('change', updateProgress);
        
        // Add floating animation on focus
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });
    
    // Form validation and submission
    form.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('button[type="submit"]');
        
        // Add loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
        submitBtn.disabled = true;
        
        // Simple validation
        let isValid = true;
        inputs.forEach(input => {
            if (input.hasAttribute('required')) {
                if (input.type === 'select-one') {
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
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Save Employee';
            submitBtn.disabled = false;
            
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
    
    // Real-time name validation
    const nameInput = form.querySelector('input[name="name"]');
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
    
    // Initialize progress
    updateProgress();
});
</script>

</body>
</html>