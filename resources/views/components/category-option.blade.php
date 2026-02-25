@foreach($categories as $category)
    <option value="{{ $category->id }}">
        {{ str_repeat('— ', $level ?? 0) . $category->name }}
    </option>

    @if($category->childrenRecursive->count())
        @include('components.category-option', [
            'categories' => $category->childrenRecursive,
            'level' => ($level ?? 0) + 1
        ])
    @endif
@endforeach