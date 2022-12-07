@props(['width' => 'xl:w-6/12'])

<div class="flex justify-center">
  <div class="mb-10 mr-4 {{ $width }}">
    <div class="input-group relative flex flex-wrap items-stretch w-full">
      <input type="search" {{ $attributes }}
        class="form-control relative flex-auto block w-full px-3 py-1.5 border-2 font-normal text-blue-700
            focus:border-indigo-800 focus:bg-gray-100 rounded transition ease-in-out m-0">

      <button type="submit" id="button-search"
        class="btn inline-block px-6 py-2 border-2 border-gray-600 text-gray-600 font-semibold
          leading-tight uppercase rounded hover:bg-indigo-600 hover:text-white
          focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
            Search
      </button>
    </div>
  </div>
</div>
