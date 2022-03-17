@if($editable == true)

<section class="">


        <div class="relative rounded overflow-hidden border border-grey-light mb-8 bg-white">
          <div class="border-b border-grey-light p-4 bg-grey-lighter py-8">
            <div class="bg-white mx-auto max-w-sm shadow-lg rounded-lg overflow-hidden">
    <div class="container items-center px-5 py-12 lg:px-20">

        <div class="relative pt-4">
          <label for="name" class="text-base leading-7 text-blueGray-500">ID</label>
          <input disabled type="text" id="name" name="name" value="{{ $datas->id }}" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
        </div>
        <div class="relative pt-4">
          <label for="name" class="text-base leading-7 text-blueGray-500">Type</label>
          <input disabled type="text" id="text" name="number" value="{{ $datas->type }}" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
        </div>
        <div class="relative pt-4">
          <label for="name" class="text-base leading-7 text-blueGray-500">Activity</label>
          <input wire:model='activity_name' type="text" id="date" name="date" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
        </div>
        <div class="relative pt-4">
          <label for="name" class="text-base leading-7 text-blueGray-500">Key</label>
          <input disabled type="text" id="date" name="date" value="{{ $datas->key }}" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
        </div>
  {{--
        <div class="relative mt-4">
          <label for="name" class="text-base leading-7 text-blueGray-500">Component Select</label>
          <select class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
            <option>Surabaya</option>
            <option>Bandung</option>
            <option>jakarta</option>
          </select>
        </div>  --}}

        <div class="flex items-center w-full pt-4 mb-4">
          <button wire:click="update_d('{{ $datas->id }}')" class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 "> Update </button>
        </div>
        <div class="flex items-center w-full pt-4 mb-4">
            <button wire:click="cancel" class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-red-600 border-red-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 "> Cancel </button>
          </div>
        <hr class="my-4 border-gray-200">



    </div>  </div>  </div>  </div>


    </section>


@endif

<section class="container mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="table-auto w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Type</th>
              <th class="px-4 py-3">Activity</th>
              <th class="px-4 py-3">Key</th>
              <th class="px-4 py-3">Manage</th>


          </thead>
          <tbody class="bg-white">
      @foreach ($activity as $activitys)


              <td class="px-4 py-3 border">
                <div class="flex items-center text-sm">
                 {{ $activitys->id }}
                </div>
              </td>
              <td class="px-4 py-3 border text-md font-semibold">{{ $activitys->type }}</td>
              <td class="px-4 py-3 border text-xs">
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $activitys->activity }} </span>
              </td>
              <td class="px-4 py-3 border text-sm">{{ $activitys->key }}</td>
              <td> <button wire:click="edit('{{ $activitys->id }}')" class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Edit</button> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <div class="flex justify-center">
        <button wire:click="more({{ $limit + 1 }})" class="bg-pink-500 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded">Fetch More</button>
        </div>
        <br>
{{--  {{ $fetchlimit }}  --}}

      </div>

    </div>
  </section>

