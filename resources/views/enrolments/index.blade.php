<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Manage Enrolments') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-80">
      <table class="min-w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Student')" />
            <x-table.heading :value="__('Course')" />
            <x-table.heading :value="__('Created on')" class="text-center" />
            <x-table.heading :value="__('Status')" class="text-center" />
          </tr>
        </thead>
        <tbody>
          @foreach ($enrolments as $enrolment)
            <tr class="border-b">
              <x-table.cell :value="$loop->index+1" />
              <x-table.cell :value="$enrolment->student->fullName" class="truncate"/>
              <x-table.cell :value="$enrolment->course->name" />
              <x-table.cell :value="$enrolment->created_at->format('d/m/Y h:i A')" class="uppercase text-center"/>
              <td class="text-center">
                <x-forms.button-dropdown name="{{$enrolment->status}}" id="updateStatusBtn">
                  <x-slot name="menu">
                    <x-forms.dropdown-link link="{{route('enrolments.show', [$enrolment->id])}}"
                      :value="__('View Application')" />
                    <x-forms.dropdown-link link="{{route('enrolments.status', [$enrolment->id, 'accepted'])}}"
                      :value="__('Accept Application')" />
                    <x-forms.dropdown-link link="{{route('enrolments.status', [$enrolment->id, 'rejected'])}}"
                      :value="__('Reject Application')" />
                  </x-slot>
                </x-forms.button-dropdown>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-content.card>
</x-app-layout>
