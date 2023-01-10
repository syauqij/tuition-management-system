<x-content.card>
  <h1 class="text-xl font-bold">
    Student Details
  </h1>
  <div class="grid gap-4 gap-y-6 grid-cols-1 md:grid-cols-5 pt-4">
    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('First Name')" :value="$student->first_name"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Last Name')" :value="$student->last_name"/>
    </div>

    <div class="md:col-start-1 md:col-span-2">
      <x-content.profile-detail :label="__('MyKad')" :value="$student->mykad"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Bithdate')" :value="$student->birthdate"/>
    </div>

    <div class="md:col-span-1 capitalize">
      <x-content.profile-detail :label="__('Gender')" :value="$student->gender"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Email')" :value="$student->email"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Phone No.')" :value="$student->phone_no"/>
    </div>

    <div class="md:col-span-5">
      <x-content.profile-detail :label="__('Address')" >
        {!! $studentAddress !!}
      </x-content.profile-detail>
    </div>
  </div>
</x-content.card>

<x-content.card>
  <h1 class="text-xl font-bold">
    Parent Details
  </h1>
  <div class="grid gap-4 gap-y-6 grid-cols-1 md:grid-cols-5 pt-4">
    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('First Name')" :value="$parent->first_name"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Last Name')" :value="$parent->last_name"/>
    </div>

    <div class="md:col-start-1 md:col-span-2">
      <x-content.profile-detail :label="__('MyKad')" :value="$parent->mykad"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Bithdate')" :value="$parent->birthdate"/>
    </div>

    <div class="md:col-span-1 capitalize">
      <x-content.profile-detail :label="__('Gender')" :value="$parent->gender"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Email')" :value="$parent->email"/>
    </div>

    <div class="md:col-span-2">
      <x-content.profile-detail :label="__('Phone No.')" :value="$parent->phone_no"/>
    </div>

    <div class="md:col-span-5">
      <x-content.profile-detail :label="__('Address')" >
        {!! $parentAddress !!}
      </x-content.profile-detail>
    </div>
  </div>
</x-content.card>
