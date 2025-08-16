<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Logs Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            margin: 2rem auto;
            padding: 0;
            overflow: hidden;
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

        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
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

        .page-header h2 {
            position: relative;
            z-index: 2;
            margin: 0;
            font-weight: 300;
            font-size: 2.5rem;
        }

        .page-header .subtitle {
            position: relative;
            z-index: 2;
            opacity: 0.9;
            margin-top: 0.5rem;
            font-size: 1.2rem;
        }

        .content-body {
            padding: 3rem;
        }

        /* Filter Section */
        .filter-section {
            background: linear-gradient(135deg, #f8f9ff 0%, #e3e7ff 100%);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #e0e6ff;
            animation: fadeIn 0.6s ease-in;
        }

        .filter-title {
            color: #667eea;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-control {
            border: 2px solid #e1e8ed;
            border-radius: 15px;
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-1px);
        }

        .btn {
            border-radius: 15px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Quick Actions */
        .quick-actions {
            background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 100%);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #c8e6c9;
            animation: fadeIn 0.6s ease-in;
            animation-delay: 0.2s;
        }

        .quick-actions-title {
            color: #2e7d32;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-form {
            display: flex;
            gap: 1rem;
            align-items: end;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .btn-success {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #219a52 0%, #28b463 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #ec7063 100%);
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #c0392b 0%, #e55039 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        /* Table Styling */
        .table-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-in;
            animation-delay: 0.4s;
        }

        .table-title {
            color: #667eea;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
            font-size: 0.9rem;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-on-time {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
        }

        .status-late {
            background: linear-gradient(135deg, #f39c12 0%, #f1c40f 100%);
            color: white;
        }

        .status-absent {
            background: linear-gradient(135deg, #e74c3c 0%, #ec7063 100%);
            color: white;
        }

        .status-early {
            background: linear-gradient(135deg, #3498db 0%, #5dade2 100%);
            color: white;
        }

        .employee-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .employee-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .department-tag {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .time-display {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #2c3e50;
            background: #f8f9fa;
            padding: 0.3rem 0.6rem;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .content-body {
                padding: 2rem;
            }

            .page-header {
                padding: 2rem;
            }

            .page-header h2 {
                font-size: 2rem;
            }

            .filter-section,
            .quick-actions {
                padding: 1.5rem;
            }

            .action-form {
                flex-direction: column;
                align-items: stretch;
            }

            .table-responsive {
                border-radius: 15px;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stats-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .stat-card {
            flex: 1;
            min-width: 200px;
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

<div class="container-fluid px-4">
    <div class="main-container">
        <div class="page-header">
            <h2><i class="fas fa-clock me-3"></i>Attendance Dashboard</h2>
            <p class="subtitle">Monitor and manage employee attendance logs</p>
        </div>

        <div class="content-body">
           
            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-title">
                    <i class="fas fa-filter"></i>
                    Filter Attendance Logs
                </div>

                <form class="row g-3" method="GET" action="{{ route('attendance.index') }}">
                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Date From
                        </label>
                        <input type="date" name="date_from" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Date To
                        </label>
                        <input type="date" name="date_to" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="fas fa-building me-2"></i>
                            Department ID
                        </label>
                        <input type="text" name="department_id" class="form-control" placeholder="Enter Department ID">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i>
                            Apply Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="quick-actions-title">
                    <i class="fas fa-zap"></i>
                    Quick Actions
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('attendance.checkin') }}" class="action-form">
                            @csrf
                            <div class="flex-fill">
                                <label class="form-label">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Check In Employee
                                </label>
                                <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID" required>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Check In
                            </button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form method="POST" action="{{ route('attendance.checkout') }}" class="action-form">
                            @csrf
                            <div class="flex-fill">
                                <label class="form-label">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Check Out Employee
                                </label>
                                <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID" required>
                            </div>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Check Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="table-section">
                <div class="table-title">
                    <i class="fas fa-list"></i>
                    Attendance Logs
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="fas fa-user me-2"></i>Employee</th>
                                <th><i class="fas fa-building me-2"></i>Department</th>
                                <th><i class="fas fa-calendar me-2"></i>Date</th>
                                <th><i class="fas fa-sign-in-alt me-2"></i>Clock In</th>
                                <th><i class="fas fa-info-circle me-2"></i>Status In</th>
                                <th><i class="fas fa-sign-out-alt me-2"></i>Clock Out</th>
                                <th><i class="fas fa-info-circle me-2"></i>Status Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logs as $index => $log)
                                <tr style="animation-delay: {{ $index * 0.1 }}s;" class="fade-in">
                                    <td>
                                        <div class="employee-info">
                                            <div class="employee-avatar">
                                                {{ strtoupper(substr($log['name'], 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $log['name'] }}</div>
                                                <small class="text-muted">ID: {{ $log['employee_id'] }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="department-tag">{{ $log['department'] }}</span>
                                    </td>
                                    <td>
                                        <div class="time-display">
                                            <i class="fas fa-calendar-day me-2"></i>
                                            {{ $log['date'] }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($log['clock_in'])
                                            <div class="time-display">
                                                <i class="fas fa-clock me-2"></i>
                                                {{ $log['clock_in'] }}
                                            </div>
                                        @else
                                            <span class="text-muted">--:--</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($log['status_in'])
                                            <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $log['status_in'])) }}">
                                                {{ $log['status_in'] }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($log['clock_out'])
                                            <div class="time-display">
                                                <i class="fas fa-clock me-2"></i>
                                                {{ $log['clock_out'] }}
                                            </div>
                                        @else
                                            <span class="text-muted">--:--</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($log['status_out'])
                                            <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $log['status_out'])) }}">
                                                {{ $log['status_out'] }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <h5>No Attendance Logs Found</h5>
                                        <p>There are no attendance records available for the selected criteria.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate table rows on load
    const tableRows = document.querySelectorAll('.fade-in');
    tableRows.forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Form validation and feedback
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Add loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            submitBtn.disabled = true;
            
            // Reset after 3 seconds (in case of no redirect)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });
    });

    // Add real-time clock
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        const dateString = now.toLocaleDateString();
        
        // You can add a clock element to show current time
        console.log(`Current time: ${timeString} - ${dateString}`);
    }

    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call

    // Auto-refresh page every 5 minutes for live data
    setInterval(() => {
        // Only refresh if no forms are being filled
        const activeElement = document.activeElement;
        if (!activeElement || activeElement.tagName !== 'INPUT') {
            console.log('Auto-refreshing for latest data...');
            // Uncomment next line for auto-refresh
            // window.location.reload();
        }
    }, 300000); // 5 minutes
});
</script>

</body>
</html>