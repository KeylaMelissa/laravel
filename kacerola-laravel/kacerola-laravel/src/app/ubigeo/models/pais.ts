import { Departamento } from './departamento';

export class Pais {
  id: number;
  nombre: string;
  abreviatura: string;
  departamentos: Departamento[];
  id_usuario_crea: number;
  fecha_crea: string;
}
