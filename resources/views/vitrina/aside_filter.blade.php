{{-- Filtro lateral - PC --}}
<div class="mt-6 mb-10 w-48 ">
    <hr>
    <ul class="mt-6">
        {{-- categorias --}}
        @if ( count($principal_categories) > 0 )
        <li class="mb-8">
            <h3 class="font-bold text-gray-900 text-lg mb-1"> Categorias </h3>

            @foreach ($principal_categories as $category)
                <div>
                    <div class="flex text-gray-700 font-semibold my-1 text-md">
                        <a class="hover:text-blue-600" href="{{ route('products.category.show', $category->slug) }}">
                            <span class="categoryPrincipal">{{ $category->category }}</span>
                            <span class="text-gray-400"> ({{ count($category->products) }}) </span>
                        </a>
                        @if ( count( $category->categories_children($category->id) ) > 0 )
                            <div class="flex h-5 w-5 self-center text-center bg-white rounded-full shadow-sm lg:shadow-md ml-auto items-center cursor-pointer displayCategoriesChildren">
                                <svg class="fill-current text-gray-900 h-1 mx-auto return_rotate_select_icon" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.29866 0.333143L7.50671 4.75228L12.7148 0.333143C13.2383 -0.111048 14.0839 -0.111048 14.6074 0.333143C15.1309 0.777335 15.1309 1.49487 14.6074 1.93907L8.44631 7.16686C7.92282 7.61105 7.07718 7.61105 6.55369 7.16686L0.392617 1.93907C-0.130872 1.49487 -0.130872 0.777335 0.392617 0.333143C0.916107 -0.0996583 1.77517 -0.111048 2.29866 0.333143Z" />
                                </svg>
                            </div>
                        @endif
                        <span hidden class="categoryId">{{ $category->id }}</span>
                    </div>
                    {{-- contenedor de las categorias hijo --}}
                    <div class="containerChildCategories">
                    </div>
                </div>
            @endforeach

            {{-- Modelo de categorias hijos --}}
            <div hidden id="modelCategoryChild">
                <div class="col-span-1 my-1 text-sm pl-1">
                    <a class="text-gray-500 hover:text-blue-600 slugCategoryChild" href="">
                        <span class="titleCategoryChild categoryPrincipal"></span>
                        <span class="text-gray-400 quantityProductsCategoryChild"> </span>
                    </a>
                    <span hidden class="categoryId">{{ $category->id }}</span>
                </div>
            </div>

            <div class="text-blue-600 font-semibold my-1 text-md">
                <button class="hover:text-blue-600 modalCategories">
                    Ver más
                </button>
            </div>
        </li>
        <hr>
        @endif

        {{-- estaods --}}
        <li class=" mb-8">
            <h3 class="font-bold text-gray-900 text-lg mb-1"> Estados </h3>

            <div class="w-full" id="badgeStateSelected" style="display:none;">
                <span class="flex bg-green-500 text-white rounded-full shadow w-full px-3 py-1">
                    <span class="inline self-center text-sm" id="stateSelected"></span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto removeStateSelected" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            </div>

            <div id="containerEstados"> </div>

            <div class="text-blue-600 font-semibold my-1 text-md">
                <button class="hover:text-blue-600 modalStates">
                    Ver más
                </button>
            </div>

        </li>
        <hr>

        {{-- Ciudades --}}
        <li class="" id="listCitiesFilter" style="display:none;">
            <h3 class="font-bold text-gray-900 text-lg mb-1"> Ciudades </h3>

            <div class="w-full" id="badgeCitySelected" style="display:none;">
                <span class="flex bg-green-500 text-white rounded-full shadow w-full px-3 py-1">
                    <span class="inline self-center text-sm" id="citySelected"></span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto removeCitySelected" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            </div>

            <div id="containerCiudades"> </div>

            <div class="text-blue-600 font-semibold my-1 text-md">
                <button class="hover:text-blue-600 modalCities">
                    Ver más
                </button>
            </div>

        </li>

        <div id="modelStateAndCity">
            <div class="text-gray-700 font-semibold my-1 text-md">
                <span class="hover:text-blue-600 cursor-pointer titleElement"></span>
                <span hidden  class="valueElement"></span>
            </div>
        </div>

    </ul>
    <span hidden id="siteUrl"> {{ env('APP_URL') }} </span>
</div>

{{-- Formulario para consultas y filtro --}}
<div hidden>
    <form action="" id="formQueryFilter">
        @isset($query)
            <input type="text" name="q" value="{{ $query }}" id="querySearch">
        @endisset
        @isset($category_selected)
            <input type="text" value="{{ $category_selected->slug }}" id="categorySelected">
        @endisset

        <input type="text" name="state" id="stateSelectedForm">

        <input type="text" name="city" id="citySelectedForm">

    </form>

</div>
