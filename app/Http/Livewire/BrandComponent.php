<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

use Livewire\WithFileUploads;

class BrandComponent extends Component
{
    use WithFileUploads;

    public $message_alert, $color_alert, $brand, $brand_id, $user_id, $profile_photo_path_brand;

    public $openModal = false;
    public $openModalActualizar = false;

    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';

        //reglas de validacion, protected indica que solo se usara en este modelo
        protected $rules = [
            'brand' => 'required',
            'profile_photo_path_brand' => 'required'
        ];

        // para cambiar los nombres de los atributos de validacion que vienen por default
        protected $validationAttributes = [
            'brand' => 'Marca'
        ];

        // para cambiar los nombres de los atributos de validacion que vienen por default
        protected $messages = [
            'banner.required' => 'Este campo () es necesario'
        ];

        public function render()
        {
            $brand_user = Brand::where('user_id', $this->user_id)->first();
            return view('livewire.brand-component', compact('brand_user'));
        }

        public function crear()
        {
            //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
            $this->validate([
                'brand' => 'required',
                'profile_photo_path_brand' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen=$this->profile_photo_path_brand->store('public');

            $slug = trim($this->eliminar_simbolos($this->brand));
            $slug = str_replace(' ','-', $slug);
            $slug = strtolower($slug);

            Brand::create([
                'brand' => $this->brand,
                'user_id' => $this->user_id,
                'slug' => $slug,
                'profile_photo_path_brand' => $path_imagen
            ]);
            //reinicio las propiedades
            $this->reset(['brand', 'profile_photo_path_brand', 'action','show_alert','message_alert','color_alert','openModal']);
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'guardada';
        }

        public function update(){

            $brand = Brand::where('user_id', $this->user_id)->first();
            if ($this->profile_photo_path_brand) {
                //Guardo la imagen en la carpeta storage, enlace public
                $path_imagen=$this->profile_photo_path_brand->store('public');

                if ($this->brand != '') {

                    $slug = trim($this->eliminar_simbolos($this->brand));
                    $slug = str_replace(' ','-', $slug);
                    $slug = strtolower($slug);

                    $brand->update([
                        'brand' => $this->brand,
                        'slug' => $slug,
                        'profile_photo_path_brand' => $path_imagen
                    ]);
                }else{
                    $brand->update([
                        'profile_photo_path_brand' => $path_imagen
                    ]);
                }

            } else {

                $slug = trim($this->eliminar_simbolos($this->brand));
                $slug = str_replace(' ','-', $slug);
                $slug = strtolower($slug);

                $brand->update([
                    'brand' => $this->brand,
                    'slug' => $slug,
                ]);
            }

            //reinicio las propiedades
            $this->reset(['brand', 'profile_photo_path_brand', 'action','show_alert','message_alert','color_alert', 'openModalActualizar']);
            $this->show_alert = 'true';
            $this->color_alert = 'blue';
            $this->message_alert = 'actualizada';
        }

        /*Eliminar simbolos: Realiza una limpieza de los simbolos de la palabra*/
        public function eliminar_simbolos($string){

            $string = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
                $string
                );
                $string = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                array('e', 'e', 'e', 'e', 'e', 'e', 'e', 'e'),
                $string
                );
                $string = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                array('i', 'i', 'i', 'i', 'i', 'i', 'i', 'i'),
                $string
                );
                $string = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                array('o', 'o', 'o', 'o', 'o', 'o', 'o', 'o'),
                $string
                );
                $string = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                array('u', 'u', 'u', 'u', 'u', 'u', 'u', 'u'),
                $string
                );
                $string = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'),
                array('n', 'n', 'c', 'c',),
                $string
                );
                $string = str_replace(
                array("\\","¨","º","-","~",
                "#","@","|","!","\"",
                "·","$","%","&","/",
                "(",")","?","'","¡",
                "¿","[","^","<code>","]",
                "+","}","{","¨","´",
                ">","<",";",",",":",
                "."),
                '',
                $string
            );
            return $string;
        }

        public function buttonActualizarBrand(){
            $this->openModalActualizar = true;
            $brand_user = Brand::where('user_id', $this->user_id)->first();

            $this->brand = $brand_user->brand;
            // $this->profile_photo_path_brand = $brand_user->profile_photo_path_brand;
        }

        public function cancelar(){
            $this->reset(['brand', 'profile_photo_path_brand','show_alert','message_alert','color_alert', 'openModalActualizar']);
        }
}

