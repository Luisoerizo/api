<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)  //Modificando valores obtenidos a través del API para mostrar cumpliendo requisitos específicos
    {
        return [
            'id' => $this->id,
            'nombre' => Str::of($this->name)->upper(), //Transformando todo el valor a mayúsculas
            'fecha de creación' => $this->created_at->format('d-m-Y'), //Definiendo formato de la fecha
            'última modificación' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
