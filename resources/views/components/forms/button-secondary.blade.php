<button {{ $attributes->merge(['type' => 'submit', 'class' =>
  'inline-block px-6 py-2 mr-2 bg-gray-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md
  hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
  active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out ripple-surface-light'
]) }}>
  {{ $slot }}
</button>
