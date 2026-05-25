<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
            <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad', $sucursal?->ciudad) }}" id="ciudad" placeholder="Ciudad">
            {!! $errors->first('ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion_fisica" class="form-label">{{ __('Direccion Fisica') }}</label>
            <input type="text" name="direccion_fisica" class="form-control @error('direccion_fisica') is-invalid @enderror" value="{{ old('direccion_fisica', $sucursal?->direccion_fisica) }}" id="direccion_fisica" placeholder="Direccion Fisica">
            {!! $errors->first('direccion_fisica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono_contacto" class="form-label">{{ __('Telefono Contacto') }}</label>
            <input type="text" name="telefono_contacto" class="form-control @error('telefono_contacto') is-invalid @enderror" value="{{ old('telefono_contacto', $sucursal?->telefono_contacto) }}" id="telefono_contacto" placeholder="Telefono Contacto">
            {!! $errors->first('telefono_contacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>