<div class="px-5 py-20 mx-auto bg-gray-100">
  <div class="lg:w-4/6 flex flex-col sm:flex-row sm:items-center items-start mx-auto">
    <h1 class="flex-grow sm:pr-16 text-2xl font-medium title-font text-indigo-600">
      Join TMS Now <br/>
      <span class="text-xl text-black">
        Don’t get left behind. More than 59,000 students are learning
        <br class="hidden lg:inline-block">something new with TMS every day.
      </span>
    </h1>
    <a href=" {{ route('register') }} " >
      <x-forms.button-primary class="text-lg py-4">
        {{ __('REGISTER NOW') }}
      </x-forms.button-primary>
    </a>
  </div>
</div>
