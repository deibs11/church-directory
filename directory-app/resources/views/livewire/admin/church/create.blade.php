<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Church') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.church.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Church')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Nombre Input -->
            <div class='form-group'>
                <label for='input-nombre' class='col-sm-2 control-label '> {{ __('Nombre') }}</label>
                <input type='text' id='input-nombre' wire:model.lazy='nombre' class="form-control  @error('nombre') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Descripcion Input -->
            <div class='form-group'>
                <label for='input-descripcion' class='col-sm-2 control-label '> {{ __('Descripcion') }}</label>
                <input type='text' id='input-descripcion' wire:model.lazy='descripcion' class="form-control  @error('descripcion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('descripcion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Direccion Input -->
            <div class='form-group'>
                <label for='input-direccion' class='col-sm-2 control-label '> {{ __('Direccion') }}</label>
                <input type='text' id='input-direccion' wire:model.lazy='direccion' class="form-control  @error('direccion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('direccion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Ciudad Input -->
            <div class='form-group'>
                <label for='input-ciudad' class='col-sm-2 control-label '> {{ __('Ciudad') }}</label>
                <input type='text' id='input-ciudad' wire:model.lazy='ciudad' class="form-control  @error('ciudad') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('ciudad') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Estado Input -->
            <div class='form-group'>
                <label for='input-estado' class='col-sm-2 control-label '> {{ __('Estado') }}</label>
                <input type='text' id='input-estado' wire:model.lazy='estado' class="form-control  @error('estado') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('estado') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Pais Input -->
            <div class='form-group'>
                <label for='input-pais' class='col-sm-2 control-label '> {{ __('Pais') }}</label>
                <input type='text' id='input-pais' wire:model.lazy='pais' class="form-control  @error('pais') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('pais') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Cp Input -->
            <div class='form-group'>
                <label for='input-cp' class='col-sm-2 control-label '> {{ __('Cp') }}</label>
                <input type='text' id='input-cp' wire:model.lazy='cp' class="form-control  @error('cp') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('cp') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Status Input -->
            <div class='form-group'>
                <label for='input-status' class='col-sm-2 control-label '> {{ __('Status') }}</label>
                <input type='text' id='input-status' wire:model.lazy='status' class="form-control  @error('status') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('status') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Telefono Input -->
            <div class='form-group'>
                <label for='input-telefono' class='col-sm-2 control-label '> {{ __('Telefono') }}</label>
                <input type='text' id='input-telefono' wire:model.lazy='telefono' class="form-control  @error('telefono') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('telefono') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Email Input -->
            <div class='form-group'>
                <label for='input-email' class='col-sm-2 control-label '> {{ __('Email') }}</label>
                <input type='text' id='input-email' wire:model.lazy='email' class="form-control  @error('email') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('email') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.church.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
