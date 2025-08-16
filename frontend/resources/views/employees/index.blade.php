<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employees Management</title>
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
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            margin-bottom: 2rem;
            overflow: hidden;
        }
        
        .header-section {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
        }
        
        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }
        
        .header-section h2 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-weight: 300;
            font-size: 2.5rem;
        }
        
        .header-section .subtitle {
            position: relative;
            z-index: 1;
            opacity: 0.9;
            margin-top: 0.5rem;
        }
        
        .content-section {
            padding: 2.5rem;
        }
        
        .add-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
            color: white;
        }
        
        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 1.5rem;
        }
        
        .table {
            margin: 0;
        }
        
        .table thead th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: none;
            color: #495057;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1.2rem 1rem;
            position: sticky;
            top: 0;
        }
        
        .table tbody td {
            padding: 1.2rem 1rem;
            border-color: #f1f3f4;
            vertical-align: middle;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9ff;
            transform: scale(1.002);
        }
        
        .employee-id {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-block;
            min-width: 60px;
            text-align: center;
        }
        
        .employee-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.05rem;
        }
        
        .department-badge {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .btn-action {
            border-radius: 20px;
            padding: 0.4rem 1rem;
            font-weight: 500;
            font-size: 0.85rem;
            margin: 0 2px;
            transition: all 0.2s ease;
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);
            border: none;
            color: white;
        }
        
        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
            color: white;
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            color: white;
        }
        
        .btn-delete:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
            color: white;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            transition: transform 0.2s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-2px);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 768px) {
            .content-section {
                padding: 1.5rem;
            }
            
            .table-container {
                font-size: 0.9rem;
            }
            
            .btn-action {
                padding: 0.3rem 0.8rem;
                font-size: 0.8rem;
                margin: 1px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="main-container fade-in">
            <div class="header-section">
                <h2><i class="fas fa-users me-3"></i>Employee Management</h2>
                <p class="subtitle">Manage your team efficiently</p>
            </div>
            
            <div class="content-section">
                <!-- Quick Stats -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="stats-card">
                            <div class="stats-number">{{ count($employees ?? []) }}</div>
                            <div class="text-muted">Total Employees</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 text-dark">Employee Directory</h5>
                    <a href="{{ route('employees.create') }}" class="btn add-btn">
                        <i class="fas fa-plus me-2"></i>Add New Employee
                    </a>
                </div>

                <div class="table-container">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-id-badge me-2"></i>Employee ID</th>
                                <th><i class="fas fa-user me-2"></i>Name</th>
                                <th><i class="fas fa-map-marker-alt me-2"></i>Address</th>
                                <th><i class="fas fa-building me-2"></i>Department</th>
                                <th><i class="fas fa-cogs me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $emp)
                                <tr class="fade-in">
                                    <td>
                                        <span class="employee-id">{{ $emp['employee_id'] }}</span>
                                    </td>
                                    <td>
                                        <div class="employee-name">{{ $emp['name'] }}</div>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $emp['address'] ?: 'Not specified' }}</span>
                                    </td>
                                    <td>
                                        @if(isset($emp['department']['department_name']))
                                            <span class="department-badge">{{ $emp['department']['department_name'] }}</span>
                                        @else
                                            <span class="badge bg-secondary">Unassigned</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('employees.edit', $emp['id']) }}" class="btn btn-edit btn-action" title="Edit Employee">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('employees.destroy', $emp['id']) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete btn-action" 
                                                        onclick="return confirm('Are you sure you want to delete this employee? This action cannot be undone.')"
                                                        title="Delete Employee">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        <i class="fas fa-users-slash"></i>
                                        <h5>No employees found</h5>
                                        <p class="mb-0">Start by adding your first employee to the system.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add stagger animation to table rows
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Enhanced delete confirmation
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const employeeName = this.closest('tr').querySelector('.employee-name').textContent;
                    
                    if (confirm(`Are you sure you want to delete employee "${employeeName}"? This action cannot be undone.`)) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</body>
</html>