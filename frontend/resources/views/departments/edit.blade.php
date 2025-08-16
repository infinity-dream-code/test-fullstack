<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M20 20h15v15h-15z" fill="rgba(255,255,255,0.1)"/><path d="M60 10h20v20h-20z" fill="rgba(255,255,255,0.1)"/><path d="M10 60h25v15h-25z" fill="rgba(255,255,255,0.1)"/><path d="M70 70h10v10h-10z" fill="rgba(255,255,255,0.1)"/></svg>');
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
        
        .form-control {
            border: 2px solid #e1e8ed;
            border-radius: 15px;
            padding: 1rem 1.2rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-2px);
        }
        
        .form-control::placeholder {
            color: #a0aec0;
        }
        
        .form-control[type="time"] {
            font-family: 'Courier New', monospace;
            font-weight: 500;
        }
        
        .btn-container {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 1rem 2.5rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            flex: 1;
            min-width: 150px;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
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
            background: linear-gradient(135deg, #e8f0fe 0%, #d1e7ff 100%);
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
        
        .time-preview {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1.5rem;
            border-left: 4px solid #667eea;
        }
        
        .time-preview h6 {
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .time-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem;
            background: white;
            border-radius: 8px;
            margin: 0.3rem 0;
        }
        
        .time-label {
            font-weight: 600;
            color: #495057;
        }
        
        .time-value {
            font-family: 'Courier New', monospace;
            color: #667eea;
            font-weight: 500;
        }
        
        .current-data-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 0.5rem;
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
            <h2><i class="fas fa-edit me-3"></i>Edit Department</h2>
            <p class="subtitle">Update department information and schedule settings</p>
        </div>

        <div class="form-body">
            <div class="form-tips fade-in">
                <h6><i class="fas fa-info-circle me-2"></i>Editing Department</h6>
                <p class="mb-0">Update the department details and modify the maximum allowed clock-in and clock-out times. Changes will be reflected immediately for attendance validation.</p>
            </div>

            <form action="{{ route('departments.update', $department['id']) }}" method="POST" id="departmentForm">
                @csrf @method('PUT')

                <div class="form-group fade-in" style="animation-delay: 0.1s;">
                    <label class="form-label">
                        <i class="fas fa-building"></i>
                        Department Name
                        <span class="required-indicator">*</span>
                        <span class="current-data-badge">Current</span>
                    </label>
                    <input type="text" 
                           name="department_name" 
                           id="departmentName"
                           class="form-control" 
                           value="{{ $department['department_name'] }}"
                           placeholder="Enter department name (e.g., Human Resources, IT Department)"
                           required>
                </div>

                <div class="form-group fade-in" style="animation-delay: 0.2s;">
                    <label class="form-label">
                        <i class="fas fa-clock"></i>
                        Maximum Clock In Time
                        <span class="required-indicator">*</span>
                        <span class="current-data-badge">Current</span>
                    </label>
                    <input type="time" 
                           name="max_clock_in_time" 
                           id="maxClockIn"
                           class="form-control" 
                           value="{{ substr($department['max_clock_in_time'],0,5) }}"
                           required>
                    <small class="text-muted">Latest time employees can clock in</small>
                </div>

                <div class="form-group fade-in" style="animation-delay: 0.3s;">
                    <label class="form-label">
                        <i class="fas fa-sign-out-alt"></i>
                        Maximum Clock Out Time
                        <span class="required-indicator">*</span>
                        <span class="current-data-badge">Current</span>
                    </label>
                    <input type="time" 
                           name="max_clock_out_time" 
                           id="maxClockOut"
                           class="form-control" 
                           value="{{ substr($department['max_clock_out_time'],0,5) }}"
                           required>
                    <small class="text-muted">Latest time employees can clock out</small>
                </div>

                <div class="time-preview fade-in" style="animation-delay: 0.4s;" id="timePreview">
                    <h6><i class="fas fa-preview me-2"></i>Schedule Preview</h6>
                    <div class="time-info">
                        <span class="time-label"><i class="fas fa-sign-in-alt me-2"></i>Max Clock In:</span>
                        <span class="time-value" id="previewClockIn">{{ substr($department['max_clock_in_time'],0,5) }}</span>
                    </div>
                    <div class="time-info">
                        <span class="time-label"><i class="fas fa-sign-out-alt me-2"></i>Max Clock Out:</span>
                        <span class="time-value" id="previewClockOut">{{ substr($department['max_clock_out_time'],0,5) }}</span>
                    </div>
                    <div class="time-info">
                        <span class="time-label"><i class="fas fa-hourglass-half me-2"></i>Work Window:</span>
                        <span class="time-value" id="workWindow">-- hours</span>
                    </div>
                </div>

                <div class="progress-bar" id="progressBar" style="width: 100%;"></div>

                <div class="btn-container fade-in" style="animation-delay: 0.5s;">
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="fas fa-save me-2"></i>
                        Update Department
                    </button>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary-custom">
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
    const form = document.getElementById('departmentForm');
    const inputs = form.querySelectorAll('input[required]');
    const progressBar = document.getElementById('progressBar');
    const timePreview = document.getElementById('timePreview');
    const previewClockIn = document.getElementById('previewClockIn');
    const previewClockOut = document.getElementById('previewClockOut');
    const workWindow = document.getElementById('workWindow');
    const maxClockIn = document.getElementById('maxClockIn');
    const maxClockOut = document.getElementById('maxClockOut');
    
    // Update progress bar and time preview
    function updateProgress() {
        let filledInputs = 0;
        inputs.forEach(input => {
            if (input.value.trim() !== '') filledInputs++;
        });
        
        const progress = (filledInputs / inputs.length) * 100;
        progressBar.style.width = progress + '%';
        
        // Update time preview
        updateTimePreview();
    }
    
    function updateTimePreview() {
        const clockInValue = maxClockIn.value;
        const clockOutValue = maxClockOut.value;
        
        previewClockIn.textContent = clockInValue || '--:--';
        previewClockOut.textContent = clockOutValue || '--:--';
        
        // Calculate work window if both times are set
        if (clockInValue && clockOutValue) {
            const clockIn = new Date('2000-01-01 ' + clockInValue);
            const clockOut = new Date('2000-01-01 ' + clockOutValue);
            let diffMs = clockOut - clockIn;
            
            // Handle next day clock out
            if (diffMs < 0) {
                diffMs += 24 * 60 * 60 * 1000;
            }
            
            const hours = Math.floor(diffMs / (1000 * 60 * 60));
            const minutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
            
            workWindow.textContent = `${hours}h ${minutes}m`;
        } else {
            workWindow.textContent = '-- hours';
        }
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
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
        submitBtn.disabled = true;
        
        // Simple validation
        let isValid = true;
        inputs.forEach(input => {
            if (input.hasAttribute('required')) {
                if (input.value.trim() === '') {
                    input.style.borderColor = '#e74c3c';
                    isValid = false;
                } else {
                    input.style.borderColor = '#667eea';
                }
            }
        });
        
        // Validate time logic
        if (maxClockIn.value && maxClockOut.value) {
            const clockIn = new Date('2000-01-01 ' + maxClockIn.value);
            const clockOut = new Date('2000-01-01 ' + maxClockOut.value);
            
            if (clockOut <= clockIn) {
                // Allow next day clock out, but show warning
                console.log('Clock out is next day - this is allowed');
            }
        }
        
        if (!isValid) {
            e.preventDefault();
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update Department';
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
    
    // Real-time department name validation
    const departmentName = document.getElementById('departmentName');
    departmentName.addEventListener('input', function() {
        const value = this.value.trim();
        if (value.length > 0 && value.length < 2) {
            this.setCustomValidity('Department name must be at least 2 characters long');
        } else if (value.length > 50) {
            this.setCustomValidity('Department name must not exceed 50 characters');
        } else {
            this.setCustomValidity('');
        }
    });
    
    // Initialize progress and time preview
    updateProgress();
    updateTimePreview();
});
</script>

</body>
</html>