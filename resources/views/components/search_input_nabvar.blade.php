{{-- <form class="flex-auto w-full self-center" action="">
<div class="relative mr-6 my-2 w-full">
    <input type="search" class="bg-purple-white shadow rounded border-0 p-3" placeholder="Search by name...">
    <div class="absolute pin-r pin-t mt-3 mr-4 text-purple-lighter">
        <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
          <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
          c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
          C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
          S32.459,40,21.983,40z"/>

      </svg>

    </div>
  </div> --}}


    {{-- <input class="w-full border border-gray-100 ring-0 ring-transparent focus:ring-0 focus:border-green-600 rounded-md shadow" type="search" placeholder="Buscar productos..." name="search"> --}}
{{-- </form> --}}

<div class="self-center flex-grow w-full ml-4">
    <form method="GET">
      <div class="relative">
        <span class="absolute inset-y-0 right-0 flex items-center pl-2">
          <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
          </button>
        </span>
        <input type="text" name="q" class="w-full border-0 ml-2 py-2 text-sm text-gray-900 rounded-md pr-10 focus:outline-none  focus:text-gray-900" placeholder="Search...">
      </div>
    </form>
  </div>

