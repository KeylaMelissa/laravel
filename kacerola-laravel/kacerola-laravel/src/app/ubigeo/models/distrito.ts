import { Provincia } from './provincia';

export class Distrito {
  id: number;
  nombre: string;
  abreviatura: string;
  provincia: Provincia;
  id_usuario_crea: number;
  fecha_crea: string;
}
