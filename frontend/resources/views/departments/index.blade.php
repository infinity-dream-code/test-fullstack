<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Departments Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
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
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M20 20h20v20h-20z" fill="rgba(255,255,255,0.1)"/><path d="M60 40h15v15h-15z" fill="rgba(255,255,255,0.1)"/><path d="M10 60h25v10h-25z" fill="rgba(255,255,255,0.1)"/></svg>');
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
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }
        
        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
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
            background-color: #fff5f5;
            transform: scale(1.002);
        }
        
        .department-id {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-block;
            min-width: 50px;
            text-align: center;
        }
        
        .department-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.1rem;
        }
        
        .time-badge {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            font-family: 'Courier New', monospace;
        }
        
        .time-in {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
        }
        
        .time-out {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
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
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            border: none;
            color: white;
        }
        
        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.3);
            color: white;
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border: none;
            color: white;
        }
        
        .btn-delete:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
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
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
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
                <h2><i class="fas fa-building me-3"></i>Departments Management</h2>
                <p class="subtitle">Manage organizational departments and schedules</p>
            </div>
            
            <div class="content-section">
                <!-- Quick Stats -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="stats-card">
                            <div class="stats-number">{{ count($departments ?? []) }}</div>
                            <div class="text-muted">Total Departments</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 text-dark">Department Directory</h5>
                    <a href="{{ route('departments.create') }}" class="btn add-btn">
                        <i class="fas fa-plus me-2"></i>Add New Department
                    </a>
                </div>

                <div class="table-container">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-building me-2"></i>Department Name</th>
                                <th><i class="fas fa-clock me-2"></i>Max Clock In</th>
                                <th><i class="fas fa-sign-out-alt me-2"></i>Max Clock Out</th>
                                <th><i class="fas fa-cogs me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $dept)
                                <tr class="fade-in">
                                    <td>
                                        <span class="department-id">{{ $dept['id'] }}</span>
                                    </td>
                                    <td>
                                        <div class="department-name">{{ $dept['department_name'] }}</div>
                                    </td>
                                    <td>
                                        <span class="time-badge time-in">
                                            <i class="fas fa-sign-in-alt me-1"></i>{{ $dept['max_clock_in_time'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="time-badge time-out">
                                            <i class="fas fa-sign-out-alt me-1"></i>{{ $dept['max_clock_out_time'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('departments.edit', $dept['id']) }}" class="btn btn-edit btn-action" title="Edit Department">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('departments.destroy', $dept['id']) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete btn-action" 
                                                        onclick="return confirm('Are you sure you want to delete this department? This action cannot be undone.')"
                                                        title="Delete Department">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        <i class="fas fa-building-slash"></i>
                                        <h5>No departments found</h5>
                                        <p class="mb-0">Start by adding your first department to the system.</p>
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
                    const departmentName = this.closest('tr').querySelector('.department-name').textContent;
                    
                    if (confirm(`Are you sure you want to delete department "${departmentName}"? This action cannot be undone and may affect employees in this department.`)) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</body>
</html>