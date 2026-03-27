<x-app-layout>
  <div class="row">
    <div class="col-md-12">
      <div class="card p-0 mt-0">
        <div class="card-header m-0 card-header-tabs card-header-warning">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper new_id">
              <h4 class="card-title ">
                {{ trans('panel.global.edit') }} {{ trans('panel.expenses_type.title_singular') }}
                @if(auth()->user()->can(['expenses_type']))
              </h4>
                <ul class="nav nav-tabs pull-right" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('expenses_type') }}">
                      <i class="material-icons">next_plan</i> {!! trans('panel.expenses_type.title') !!}
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
                @endif
            </div>
          </div>
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

          <form method="POST" action="{{ route('expenses_type.update', [$expensesType->id]) }}" enctype="multipart/form-data" id="storeExpensesTypeData">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" id="id" value="{!! $expensesType->id !!}">

            <div class="row">

              <!-- Payroll -->
              <div class="col-md-6">
                <div class="input_section">
                  <label class="col-form-label">{{ trans('panel.expenses_type.fields.pay_roll') }}<span class="text-danger"> *</span></label>
                  <div class="form-group has-default bmd-form-group">
                    <select name="payroll_id" id="payroll_id" class="form-control {{ $errors->has('payroll_id') ? 'is-invalid' : '' }}">
                      <option value="" disabled selected>Please select Grade</option>
                      @foreach($pay_rolls as $key=>$payroll)
                        <option {{ $expensesType->payroll_id == $key ? 'selected' : '' }} value="{{$key}}">
                          Grade {{$key}}
                        </option>
                      @endforeach
                    </select>
                    @if($errors->has('payroll_id'))
                    <div class="invalid-feedback">
                      {{ $errors->first('payroll_id') }}
                    </div>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Allowance Type -->
              <div class="col-md-6">
                <div class="input_section">
                  <label class="col-form-label">{{ trans('panel.expenses_type.fields.allowance_type') }}<span class="text-danger"> *</span></label>
                  <div class="form-group has-default bmd-form-group">
                    <select name="allowance_type_id" id="allowance_type_id" class="form-control {{ $errors->has('allowance_type_id') ? 'is-invalid' : '' }}">
                      <option value="">Please select allowance type</option>
                      @foreach($allowance_type as $k=>$val)
                        <option {{ $expensesType->allowance_type_id == $k ? 'selected' : '' }} value="{{$k}}">{{$val}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('allowance_type_id'))
                    <div class="invalid-feedback">
                      {{ $errors->first('allowance_type_id') }}
                    </div>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Expenses Type Name -->
              <div class="col-md-6">
                <div class="input_section">
                  <label class="col-form-label">{{ trans('panel.expenses_type.fields.name') }}<span class="text-danger"> *</span></label>
                  <div class="form-group has-default bmd-form-group">
                    <input placeholder="Expenses type name" 
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                           type="text" 
                           name="name" 
                           id="name" 
                           value="{{$expensesType->name}}" 
                           maxlength="200" 
                           required>
                    @if($errors->has('name'))
                    <div class="invalid-feedback">
                      {{ $errors->first('name') }}
                    </div>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Rate -->
              <div class="col-md-6">
                <div class="input_section">
                  <label class="col-form-label">{{ trans('panel.expenses_type.fields.rate') }}</label>
                  <div class="form-group has-default bmd-form-group">
                    <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" 
                           type="text" 
                           name="rate" 
                           id="rate" 
                           value="{{$expensesType->rate}}" 
                           pattern="^\d*(\.\d{0,2})?$" 
                           placeholder="0.00">
                    @if($errors->has('rate'))
                    <div class="invalid-feedback">
                      {{ $errors->first('rate') }}
                    </div>
                    @endif
                  </div>
                </div>
              </div>

              <!-- New: Class Field -->
              <div class="col-md-6">
                <div class="input_section">
                  <label class="col-form-label">Class <span class="text-danger"> *</span></label>
                  <div class="form-group has-default bmd-form-group">
                    <select name="class" id="class" class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}">
                      <option value="" disabled {{ old('class', $expensesType->class ?? '') == '' ? 'selected' : '' }}>Please select Class</option>
                      <option value="A" {{ old('class', $expensesType->class ?? '') == 'A' ? 'selected' : '' }}>A</option>
                      <option value="B" {{ old('class', $expensesType->class ?? '') == 'B' ? 'selected' : '' }}>B</option>
                      <option value="C" {{ old('class', $expensesType->class ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    </select>
                    @if($errors->has('class'))
                    <div class="invalid-feedback">
                      {{ $errors->first('class') }}
                    </div>
                    @endif
                  </div>
                </div>
              </div>

            </div>

            <div class="pull-right">
              {{ Form::submit('Update', array('class' => 'btn btn-theme')) }}
            </div>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  <!-- Updated Script -->
  <script>
  document.addEventListener("DOMContentLoaded", function () {

      const nameInput = document.getElementById("name");
      const classWrapper = document.getElementById("class").closest('.col-md-6');
      const classSelect = document.getElementById("class");

      function toggleClassField() {
          if (!nameInput || !classWrapper || !classSelect) return;

          let value = nameInput.value.trim().toUpperCase();

          if (value === "HQ") {
              classWrapper.style.display = "none";      // Hide Class field
              classSelect.disabled = true;
              classSelect.value = "";                   // Clear value
          } else {
              classWrapper.style.display = "block";     // Show Class field
              classSelect.disabled = false;
          }
      }

      // Trigger on typing or paste
      nameInput.addEventListener("input", toggleClassField);
      nameInput.addEventListener("change", toggleClassField);

      // Run on page load (important for Edit form)
      toggleClassField();
  });
  </script>

</x-app-layout>