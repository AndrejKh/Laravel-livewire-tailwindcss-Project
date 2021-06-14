{{-- Modal de todas las categorias --}}
<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="categoriesModal">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen"></span>​

        <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-5 pt-5 pb-2">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">Categorias del sitio</h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalCategories">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-3 w-full p-6 md:px-10 bg-gray-100 gap-2" id="categoryModalContainer">
            </div>
        </div>

        <div class="flex justify-center text-green-700 font-semibold mt-4">
            Selecciona la categoría por la cual vas a filtrar
        </div>

        <div id="cardCategoryModalExample">
            <div class="col-span-1 my-1 text-sm pl-1">
                <a class="text-lg lg:text-lg text-gray-500 hover:text-blue-600 slugCategoryChild" href="" aria-label="categoría seleccionada">
                    <span class="categoryTitle"></span>
                    <span class="text-gray-400 quantityProductsCategory"> </span>
                </a>
            </div>
        </div>

        </div>
    </div>

</div>

{{-- Modal de todas los estados --}}
<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="statesModal">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen"></span>​

        <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-5 pt-5 pb-2">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">Todos los estados</h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalState">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-3 w-full p-6 md:px-10 bg-gray-100 gap-2" id="stateModalContainer">
            </div>
        </div>

        <div class="flex justify-center text-green-700 font-semibold mt-4">
            Selecciona el estado por el cual vas a filtrar
        </div>

        <div id="cardStateModalExample">
            <div class="col-span-1 text-gray-900 hover:text-blue-600 text-lg cursor-pointer">
                <span class="titleElement"></span>
                <span hidden  class="valueElement"></span>
            </div>
        </div>

        </div>
    </div>

</div>

{{-- Modal de todas las ciudades --}}
<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="citiesModal">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen"></span>​

        <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-5 pt-5 pb-2">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">
                Todos las ciudades de
                <span class="text-green-800" id="subtitleStateModalCity"></span>
            </h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalCity">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-3 w-full p-6 md:px-10 bg-gray-100 gap-2" id="cityModalContainer">
            </div>
        </div>

        <div class="flex justify-center text-green-700 font-semibold mt-4">
            Selecciona la ciudad por la cual vas a filtrar
        </div>

        <div id="cardCityModalExample">
            <div class="col-span-1 text-gray-900 hover:text-blue-600 text-lg cursor-pointer">
                <span class="titleElement"></span>
                <span hidden  class="valueElement"></span>
            </div>
        </div>

        </div>
    </div>

</div>
