<!-- resources/views/components/filter-dropdown.blade.php -->
<select class="filter searchable-dropdown" name="{{ $name }}">
    <option value="">All</option>
    <option disabled>Search...</option>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ request()->query($name) == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>