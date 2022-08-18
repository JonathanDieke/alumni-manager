@props(['disabled' => false])


<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'appearance-none w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    {{ $slot }}
</select>
