@csrf

<div class="mb-3">
    <label class="form-label field-label">Tipo de documento</label>
    <select name="document_type" class="form-select" aria-label="Tipo de documento">
        <option value="">-- Seleccione --</option>
        <option value="CC" {{ old('document_type', optional($persona ?? null)->document_type) == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
        <option value="TI" {{ old('document_type', optional($persona ?? null)->document_type) == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
        <option value="PP" {{ old('document_type', optional($persona ?? null)->document_type) == 'PP' ? 'selected' : '' }}>Pasaporte</option>
        <option value="CE" {{ old('document_type', optional($persona ?? null)->document_type) == 'CE' ? 'selected' : '' }}>Cédula Extranjera</option>
    </select>
    @error('document_type') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label field-label">Número de documento</label>
    <input type="text" name="document_number" value="{{ old('document_number', optional($persona ?? null)->document_number) }}" class="form-control" maxlength="50">
    @error('document_number') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label field-label">Nombre</label>
    <input type="text" name="name" value="{{ old('name', optional($persona ?? null)->name) }}" class="form-control" required maxlength="100">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label field-label">Apellido</label>
    <input type="text" name="last_name" value="{{ old('last_name', optional($persona ?? null)->last_name) }}" class="form-control" maxlength="100">
    @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label field-label">Email</label>
        <input type="email" name="email" value="{{ old('email', optional($persona ?? null)->email) }}" class="form-control">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label field-label">Celular</label>
        <input type="text" name="cellphone" value="{{ old('cellphone', optional($persona ?? null)->cellphone) }}" class="form-control" maxlength="20">
        @error('cellphone') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label field-label">Fecha de nacimiento</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', optional(optional($persona ?? null)->birth_date)->format('Y-m-d')) }}" class="form-control">
        @error('birth_date') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label field-label">Edad</label>
        <input type="number" id="age_field" name="age" value="{{ old('age', optional($persona ?? null)->age) }}" class="form-control" min="0" readonly>
        @error('age') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label field-label">Dirección</label>
    <textarea name="address" class="form-control" rows="2">{{ old('address', optional($persona ?? null)->address) }}</textarea>
    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
</div>

@push('scripts')
<script>
    // Calcular edad automáticamente en el cliente cuando cambie birth_date
    (function () {
        const birthInput = document.getElementById('birth_date');
        const ageInput = document.getElementById('age_field');

        function computeAgeFromBirth(dateStr) {
            if (!dateStr) return '';
            const b = new Date(dateStr);
            if (Number.isNaN(b.getTime())) return '';
            const today = new Date();
            let age = today.getFullYear() - b.getFullYear();
            const m = today.getMonth() - b.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < b.getDate())) {
                age--;
            }
            return age >= 0 ? age : '';
        }

        if (birthInput && ageInput) {
            birthInput.addEventListener('change', function (e) {
                ageInput.value = computeAgeFromBirth(e.target.value);
            });
        }
    })();
</script>
@endpush
