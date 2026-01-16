<x-app-layout>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-icon card-header-theme">
        <div class="card-icon">
          <i class="material-icons">perm_identity</i>
        </div>
        <h4 class="card-title">{{ trans('panel.global.create') }} {{ trans('panel.role.title_singular') }}
          <span class="pull-right">
            <div class="btn-group">
              @if(auth()->user()->can(['role_access']))
              <a href="{{ url('roles') }}" class="btn btn-just-icon btn-theme" title="{!! trans('panel.role.title_singular') !!}{!! trans('panel.global.list') !!}">
                <i class="material-icons">next_plan</i>
              </a>
              @endif
            </div>
          </span>
        </h4>
      </div>
      <div class="card-body">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
          </button>
          <span>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </span>
        </div>
        @endif
        
        <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data" id="storeRoleData">
          @csrf
          
          <!-- Role Names Section -->
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="inpu_section">
                <label class="col-form-label">{{ trans('panel.role.fields.name') }}<span class="text-danger"> *</span></label>
                <div class="form-group has-default bmd-form-group">
                  <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name" id="title" value="{{ old('name', '') }}" maxlength="200" required>
                  @if($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="inpu_section">
                <label class="col-form-label">{{ trans('panel.role.fields.display_name') }}<span class="text-danger"> *</span></label>
                <div class="form-group has-default bmd-form-group">
                  <input class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" type="text" name="display_name" id="display_name" value="{{ old('display_name', '') }}" maxlength="200" required>
                  @if($errors->has('display_name'))
                    <div class="invalid-feedback">{{ $errors->first('display_name') }}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <!-- Permission Matrix Section -->
          <div class="row">
            <div class="col-md-12">
              <h5 class="mb-3">{{ trans('panel.role.fields.permissions') }}<span class="text-danger"> *</span></h5>
              
              <!-- Search and Actions -->
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div style="width: 300px;">
                  <input type="text" id="permissionSearch" class="form-control" placeholder="Start type permission name or type...">
                </div>
                <div>
                  <button type="button" class="btn btn-info btn-sm select-all-permissions">{{ trans('panel.select_all') }}</button>
                  <button type="button" class="btn btn-info btn-sm deselect-all-permissions">{{ trans('panel.deselect_all') }}</button>
                </div>
              </div>

              <!-- Permission Matrix Table -->
              <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                <table class="table table-bordered permission-matrix">
                  <thead style="position: sticky; top: 0; background: #fff; z-index: 10;">
                    <tr>
                      <th style="width: 250px; min-width: 250px;">PERMISSION</th>
                      <th class="text-center role-header" style="min-width: 150px;">
                        <input type="text" class="form-control role-name-input" placeholder="Role Name" readonly value="{{ old('display_name', 'New Role') }}">
                      </th>
                    </tr>
                  </thead>
                  <tbody id="permissionTableBody">
                    @php
                      // Group permissions by category
                      $groupedPermissions = [];
                      foreach($permissions as $id => $permissionName) {
                        // Extract category from permission name (e.g., "user_access" -> "User")
                        $parts = explode('_', $permissionName);
                        $category = ucfirst($parts[0]);
                        if (!isset($groupedPermissions[$category])) {
                          $groupedPermissions[$category] = [];
                        }
                        $groupedPermissions[$category][$id] = $permissionName;
                      }
                    @endphp

                    @foreach($groupedPermissions as $category => $categoryPermissions)
                    <!-- Category Header -->
                    <tr class="category-row">
                      <td colspan="2" style="background: #f5f5f5; font-weight: bold; cursor: pointer;" onclick="toggleCategory('{{ $category }}')">
                        <i class="material-icons category-icon" style="vertical-align: middle; font-size: 18px;">expand_more</i>
                        {{ $category }} <span class="badge badge-secondary">{{ count($categoryPermissions) }}</span>
                      </td>
                    </tr>
                    
                    <!-- Permission Rows -->
                    @foreach($categoryPermissions as $id => $permissionName)
                    <tr class="permission-row category-{{ $category }}" data-permission="{{ strtolower($permissionName) }}" data-category="{{ $category }}">
                      <td>
                        <label class="mb-0" style="cursor: pointer;">
                          <input type="checkbox" name="permissions[]" value="{{ $id }}" class="permission-checkbox mr-2" {{ in_array($id, old('permissions', [])) ? 'checked' : '' }}>
                          {{ ucwords(str_replace('_', ' ', $permissionName)) }}
                        </label>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox d-inline-block">
                          <input type="checkbox" class="custom-control-input permission-toggle" data-permission-id="{{ $id }}" id="perm_{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'checked' : '' }}>
                          <label class="custom-control-label" for="perm_{{ $id }}">
                            <i class="material-icons" style="color: #4caf50; font-size: 20px;">check_box</i>
                          </label>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="pull-right mt-3">
            {{ Form::submit('Submit', array('class' => 'btn btn-theme')) }}
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
.permission-matrix {
  border-collapse: collapse;
  width: 100%;
}

.permission-matrix th,
.permission-matrix td {
  border: 1px solid #ddd;
  padding: 12px;
}

.permission-matrix thead th {
  background: #f8f9fa;
  font-weight: 600;
  border-bottom: 2px solid #dee2e6;
}

.role-name-input {
  text-align: center;
  font-weight: 600;
  border: none;
  background: transparent;
  pointer-events: none;
}

.category-row td {
  padding: 10px 12px;
  user-select: none;
}

.category-icon {
  transition: transform 0.3s;
}

.category-icon.collapsed {
  transform: rotate(-90deg);
}

.permission-row {
  transition: background-color 0.2s;
}

.permission-row:hover {
  background-color: #f8f9fa;
}

.custom-control-input:not(:checked) ~ .custom-control-label i {
  color: #ccc !important;
}

.permission-checkbox {
  display: none;
}

.permission-toggle {
  cursor: pointer;
}

/* Search highlight */
.highlight {
  background-color: #fff3cd;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Sync role name input with display name
  const displayNameInput = document.getElementById('display_name');
  const roleNameDisplay = document.querySelector('.role-name-input');
  
  if (displayNameInput && roleNameDisplay) {
    displayNameInput.addEventListener('input', function() {
      roleNameDisplay.value = this.value || 'New Role';
    });
  }

  // Permission toggle functionality
  document.querySelectorAll('.permission-toggle').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      const permId = this.dataset.permissionId;
      const hiddenCheckbox = document.querySelector(`input[name="permissions[]"][value="${permId}"]`);
      if (hiddenCheckbox) {
        hiddenCheckbox.checked = this.checked;
      }
    });
  });

  // Select/Deselect all
  document.querySelector('.select-all-permissions').addEventListener('click', function() {
    document.querySelectorAll('.permission-toggle, .permission-checkbox').forEach(cb => cb.checked = true);
  });

  document.querySelector('.deselect-all-permissions').addEventListener('click', function() {
    document.querySelectorAll('.permission-toggle, .permission-checkbox').forEach(cb => cb.checked = false);
  });

  // Search functionality
  document.getElementById('permissionSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    document.querySelectorAll('.permission-row').forEach(function(row) {
      const permText = row.dataset.permission;
      if (permText.includes(searchTerm) || searchTerm === '') {
        row.style.display = '';
        row.classList.toggle('highlight', searchTerm !== '' && permText.includes(searchTerm));
      } else {
        row.style.display = 'none';
        row.classList.remove('highlight');
      }
    });
  });

  // Category toggle
  window.toggleCategory = function(category) {
    const rows = document.querySelectorAll(`.category-${category}`);
    const icon = event.currentTarget.querySelector('.category-icon');
    const isCollapsed = icon.classList.contains('collapsed');
    
    rows.forEach(row => {
      row.style.display = isCollapsed ? '' : 'none';
    });
    
    icon.classList.toggle('collapsed');
  };
});
</script>

<script src="{{ url('/').'/'.asset('assets/js/validation_users.js') }}"></script>
</x-app-layout>