import { Pais } from './pais';
import { Provincia } from './provincia';

export class Departamento {
  id: number;
  nombre: string;
  abreviatura: string;
  pais: Pais;
  provincias: Provincia[];
  id_usuario_crea: number;
  fecha_crea: string;
}
